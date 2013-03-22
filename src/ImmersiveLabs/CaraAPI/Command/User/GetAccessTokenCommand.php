<?php

namespace ImmersiveLabs\CaraAPI\Command\User;

use Symfony\Component\Console\Input\InputInterface;
use ImmersiveLabs\CaraAPI\Service\API\AuthAPIService;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use ImmersiveLabs\CaraAPI\Command\BaseCommand;

class GetAccessTokenCommand extends BaseCommand
{
    protected function configure()
    {
        $this
            ->setName('user:get_access_token')
            ->setDescription('Get an access token')
            ->addOption('clientId', null, InputOption::VALUE_REQUIRED, 'Client Id')
            ->addOption('clientSecret', null, InputOption::VALUE_REQUIRED, 'Client Secret')
            ->addOption('username', null, InputOption::VALUE_REQUIRED, 'Username')
            ->addOption('password', null, InputOption::VALUE_REQUIRED, 'Password')
            ->addOption('scopes', null, InputOption::VALUE_REQUIRED, 'Scopes')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $clientId = $input->getOption('clientId');
        $clientSecret = $input->getOption('clientSecret');
        $username = $input->getOption('username');
        $password = $input->getOption('password');
        $scopes = explode(" ", $input->getOption('scopes'));

        $this->checkRequiredOptions(array(
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
            'username' => $username,
            'password' => $password,
            'scopes' => $scopes
        ));

        $this->validateScopes($scopes = $scopes);

        $accessToken = $this->getAuthAPIService()->getAccessToken($clientId, $clientSecret, $username, $password, $scopes);
        $output->writeln(json_encode($accessToken));
    }
}
