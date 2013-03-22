<?php

namespace ImmersiveLabs\CaraAPI\Command\Camera;

use Symfony\Component\Console\Input\InputInterface;
use ImmersiveLabs\CaraAPI\Service\API\AuthAPIService;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use ImmersiveLabs\CaraAPI\Command\BaseCommand;

class UpdateCommand extends BaseCommand
{
    protected function configure()
    {
        $this
            ->setName('camera:update')
            ->setDescription('Update camera information')
            ->addOption('clientId', null, InputOption::VALUE_REQUIRED, 'Client ID')
            ->addOption('clientSecret', null, InputOption::VALUE_REQUIRED, 'Client Secret')
            ->addOption('username', null, InputOption::VALUE_REQUIRED, 'Username')
            ->addOption('password', null, InputOption::VALUE_REQUIRED, 'Password')
            ->addOption('cameraKey', null, InputOption::VALUE_REQUIRED, 'Camera Key')
            ->addOption('deviceId', null, InputOption::VALUE_REQUIRED, 'Camera device id to use')
            ->addOption('cameraPath', null, InputOption::VALUE_REQUIRED, 'Camera Path')
            ->addOption('displayName', null, InputOption::VALUE_REQUIRED, 'Display Name')
            ->addOption('extraDescription', null, InputOption::VALUE_REQUIRED, 'Extra Description')
            ->addOption('host', null, InputOption::VALUE_REQUIRED, 'Host')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $clientId = $input->getOption('clientId');
        $clientSecret = $input->getOption('clientSecret');
        $username = $input->getOption('username');
        $password = $input->getOption('password');
        $cameraKey = $input->getOption('cameraKey');
        $deviceId = $input->getOption('deviceId');
        $cameraPath = $input->getOption('cameraPath');
        $displayName = $input->getOption('displayName');
        $extraDescription = $input->getOption('extraDescription');
        $host = $input->getOption('host');

        $this->checkRequiredOptions(array(
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
            'username' => $username,
            'password' => $password,
            'cameraKey' => $cameraKey
        ));

        $accessToken = $this->getAuthAPIService()->getAccessToken($clientId, $clientSecret, $username, $password, array(AuthAPIService::SCOPE_USER));

        $raw = $this->getCameraAPIService()->update($accessToken, $cameraKey, $deviceId, $cameraPath, $displayName, $extraDescription, $host);
        $output->writeln(json_encode($raw));
    }
}
