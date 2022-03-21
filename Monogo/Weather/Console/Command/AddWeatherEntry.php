<?php
namespace Monogo\Weathert\Console\Command;

use Magento\Framework\App\State;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Monogo\Weather\Api\WeatherRepositoryInterface;
use Monogo\Weather\Api\Data\WeatherInterfaceFactory;

class AddWeatherEntry extends Command
{

    const VALUE = 'value';
    const LOCATION = 'location';

    /**
     * @var WeatherRepositoryInterface
     */
    protected $weatherRepository;

    /**
     * @var WeatherInterfaceFactory
     */
    protected $weatherFactory;

    /**
     * @var State
     */
    private $state;

    /**
     * @param State $state
     * @param WeatherRepositoryInterface $weatherRepository
     * @param WeatherInterfaceFactory $weatherFactory
     */
    public function __construct(
        State $state,
        WeatherRepositoryInterface $weatherRepository,
        WeatherInterfaceFactory $weatherFactory
    ) {
        $this->state = $state;
        $this->weatherRepository = $weatherRepository;
        $this->weatherFactory = $weatherFactory;
        parent::__construct();
    }

    /**
     *
     */
    protected function configure()
    {
        $this->setName('monogo:weather:add')
            ->setDescription('Add entry into db')
            ->setDefinition([
                new InputArgument(
                    self::VALUE,
                    InputArgument::OPTIONAL,
                    'value'
                ),
                new InputArgument(
                    self::LOCATION,
                    InputArgument::OPTIONAL,
                    'location'
                ),
            ]);

        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $value = $input->getArgument(self::VALUE);
        $location = $input->getArgument(self::LOCATION);

        //todo clean this - add validation and logic
        $newWeather = $this->weatherFactory->create();
        $newWeather->setValue($value)
            ->setLocation();

        $this->weatherRepository->save($newWeather);
        //todo clean this
    }
}
