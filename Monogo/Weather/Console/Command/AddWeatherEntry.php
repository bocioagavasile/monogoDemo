<?php
namespace Monogo\Weather\Console\Command;

use Magento\Framework\App\State;
use Monogo\WeatherApi\Model\Api\WeatherApiInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Monogo\Weather\Api\WeatherRepositoryInterface;
use Monogo\Weather\Api\Data\WeatherInterfaceFactory;

use Monogo\WeatherApi\Model\WearherApiInterface;

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
     * @var WeatherApiInterface
     */
    protected $weatherApi;

    /**
     * @var State
     */
    private $state;


    public function __construct(
        State $state,
        WeatherRepositoryInterface $weatherRepository,
        WeatherInterfaceFactory $weatherFactory,
        WeatherApiInterface $weatherApi
    ) {
        $this->state = $state;
        $this->weatherRepository = $weatherRepository;
        $this->weatherFactory = $weatherFactory;
        $this->weatherApi = $weatherApi;
        parent::__construct();
    }

    /**
     *
     */
    protected function configure()
    {
        $this->setName('monogo:weather:add')
            ->setDescription('Add entry into db');

        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $$this->weatherApi->getLocationSearch('Lublin');


    }
}
