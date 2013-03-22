<?php

namespace ImmersiveLabs\CaraAPI\Command\Analytics;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use ImmersiveLabs\CaraAPI\Command\BaseCommand;
use ImmersiveLabs\CaraAPI\Service\API\AuthAPIService;

class GetRawCommand extends BaseCommand
{
    protected function configure()
    {
        $this
            ->setName('analytics:get_raw')
            ->setDescription('Get raw impressions')
            ->addOption('clientId', null, InputOption::VALUE_REQUIRED, 'Client ID')
            ->addOption('clientSecret', null, InputOption::VALUE_REQUIRED, 'Client Secret')
            ->addOption('username', null, InputOption::VALUE_REQUIRED, 'Username')
            ->addOption('password', null, InputOption::VALUE_REQUIRED, 'Password')
            ->addOption('cameraKey', null, InputOption::VALUE_REQUIRED, 'Camera Key')
            ->addOption('from', null, InputOption::VALUE_REQUIRED, 'Date From (YYYY-MM-DD HH:MM:SS) - Defaults to 1 week from now', date_format(new \DateTime('-1 week'), "Y-m-d H:i:s"))
            ->addOption('to', null, InputOption::VALUE_REQUIRED, 'Date To (YYYY-MM-DD HH:MM:SS) - Defaults to NOW', date_format(new \DateTime('now'), "Y-m-d H:i:s"))
            ->addOption('gender', null, InputOption::VALUE_REQUIRED, 'Gender unknown, male, female')
            ->addOption('age', null, InputOption::VALUE_REQUIRED, 'Age unknown, child, young adult, adult, senior')
            ->addOption('page', null, InputOption::VALUE_REQUIRED, 'Request pagination')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $clientId = $input->getOption('clientId');
        $clientSecret = $input->getOption('clientSecret');
        $username = $input->getOption('username');
        $password = $input->getOption('password');
        $cameraKey = $input->getOption('cameraKey');
        $from = $input->getOption('from');
        $to = $input->getOption('to');
        $age = $input->getOption('age');
        $gender = $input->getOption('gender');
        $page = $input->getOption('page');

        $from = new \DateTime($from);
        $to = new \DateTime($to);

        $this->checkRequiredOptions(array(
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
            'username' => $username,
            'password' => $password,
            'cameraKey' => $cameraKey
        ));

        $this->checkValidOptions($from, $to, $gender, $age);

        $accessToken = $this->getAuthAPIService()->getAccessToken($clientId, $clientSecret, $username, $password, array(AuthAPIService::SCOPE_ANALYTIC));
        $raw = $this->getAnalyticsAPIService()->getRaw($accessToken, $cameraKey, $from, $to, $age, $gender, $page);
        foreach ($raw as $r) {
            $output->writeln(json_encode($r));
        }
    }
}
