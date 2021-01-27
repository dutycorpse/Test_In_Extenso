<?php

namespace App\console;

use App\Repository\VehicleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class AddGeolocationToVehicleCommand extends Command
{
    protected static $defaultName = 'fleet:geolocate';
    private VehicleRepository $vehicleRepository;
    private EntityManagerInterface $em;

    public function __construct(VehicleRepository $vehicleRepository,
                                EntityManagerInterface $em,
                                string $name = null)
    {
        $this->vehicleRepository = $vehicleRepository;
        parent::__construct($name);
        $this->em = $em;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $this->updateVehicles();

        $io->success('all vehicles in DB have now (666, 666)');

        return 0;
    }

    private function updateVehicles()
    {
        foreach ($this->vehicleRepository->findAll() as $vehicle) {
            $vehicle->setLatitude('666');
            $vehicle->setLongitude('666');
            $this->em->persist($vehicle);
        }
        $this->em->flush();
    }
}
