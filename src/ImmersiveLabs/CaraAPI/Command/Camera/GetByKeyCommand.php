<?php

namespace ImmersiveLabs\CaraAPI\Command\Camera;

use Symfony\Component\Console\Input\InputInterface;
use ImmersiveLabs\CaraAPI\Service\API\AuthAPIService;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use ImmersiveLabs\CaraAPI\Command\BaseCommand;

class GetByKeyCommand extends BaseCommand
{
    protected function configure()
    {
        $this
            ->setName('camera:get_by_key')
            ->setDescription('Find camera by key')
            ->addOption('clientId', null, InputOption::VALUE_REQUIRED, 'Client ID')
            ->addOption('clientSecret', null, InputOption::VALUE_REQUIRED, 'Client Secret')
            ->addOption('username', null, InputOption::VALUE_REQUIRED, 'Username')
            ->addOption('password', null, InputOption::VALUE_REQUIRED, 'Password')
            ->addOption('cameraKey', null, InputOption::VALUE_REQUIRED, 'Camera Key')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $clientId = $input->getOption('clientId');
        $clientSecret = $input->getOption('clientSecret');
        $username = $input->getOption('username');
        $password = $input->getOption('password');
        $cameraKey = $input->getOption('cameraKey');

        $this->checkRequiredOptions(array(
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
            'username' => $username,
            'password' => $password,
            'cameraKey' => $cameraKey
        ));

        $accessToken = $this->getAuthAPIService()->getAccessToken($clientId, $clientSecret, $username, $password, array(AuthAPIService::SCOPE_USER));
        $raw = $this->getCameraAPIService()->getByKey($accessToken, $cameraKey);
        $output->writeln(json_encode($raw));
    }
}
