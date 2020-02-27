<?php
namespace App\Command;

use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use App\Entity\Accidents;
use App\Entity\Vehicules;
use App\Entity\Usagers;

class ImportData extends Command
{
    protected static $defaultName = 'app:import-data';
    private $container;
    private $tailleLot;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct();
        $this->container = $container;
        $this->tailleLot = 500;
        ini_set('memory_limit', '4G');
    }

    protected function configure()
    {
        $this
            ->setDescription('Import data from data.gouv.fr')
            ->setHelp('This command imports data of parsed CSV file')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $outputStyle = new OutputFormatterStyle('yellow', 'black', ['bold', 'blink']);
        $output->getFormatter()->setStyle('fire', $outputStyle);
        $outputStyle = new OutputFormatterStyle('green', 'black', ['bold', 'blink']);
        $output->getFormatter()->setStyle('fire2', $outputStyle);

        $year = 1970;
        while ($year <= (int)date('Y')+1) {
            if (file_exists("/app/src/Data/CSV/lieux_" . $year . ".csv")) {
                if (($fp = fopen("/app/src/Data/CSV/lieux_" . $year . ".csv", "r")) !== FALSE) {
                    $finalArray = [];
                    $output->writeln(PHP_EOL.'<fire> === Traitement de l\'année ' . $year . ' === </fire>');
                    $output->writeln('<fire2> - Import CSV des lieux</fire2>');
                    $progressBar1 = new ProgressBar($output);
                    $progressBar1->start();
                    $i = 0;
                    while (($row = fgetcsv($fp, 1000, ",")) !== FALSE) {
                        if ($i > 0) {
                            $finalArray[$row[0]]["catr"] = $row[1];
                            $finalArray[$row[0]]["voie"] = $row[2];
                            $finalArray[$row[0]]["v1"] = $row[3];
                            $finalArray[$row[0]]["v2"] = $row[4];
                            $finalArray[$row[0]]["circ"] = $row[5];
                            $finalArray[$row[0]]["nbv"] = $row[6];
                            $finalArray[$row[0]]["pr"] = $row[7];
                            $finalArray[$row[0]]["pr1"] = $row[8];
                            $finalArray[$row[0]]["vosp"] = $row[9];
                            $finalArray[$row[0]]["prof"] = $row[10];
                            $finalArray[$row[0]]["plan"] = $row[11];
                            $finalArray[$row[0]]["lartpc"] = $row[12];
                            $finalArray[$row[0]]["larrout"] = $row[13];
                            $finalArray[$row[0]]["surf"] = $row[14];
                            $finalArray[$row[0]]["infra"] = $row[15];
                            $finalArray[$row[0]]["situ"] = $row[16];
                            $finalArray[$row[0]]["env1"] = $row[17];
                            $finalArray[$row[0]]["usagers"] = [];
                            $finalArray[$row[0]]["vehicules"] = [];
                            $progressBar1->advance();
                        }
                        $i++;
                    }
                    $progressBar1->finish();
                    fclose($fp);
                }
                if (($fp = fopen("/app/src/Data/CSV/caracteristiques_" . $year . ".csv", "r")) !== FALSE) {
                    $i = 0;
                    $output->writeln(PHP_EOL . '<fire2> - Import CSV des caracteristiques</fire2>');
                    $progressBar2 = new ProgressBar($output);
                    $progressBar2->start();
                    while (($row = fgetcsv($fp, 1000, ",")) !== FALSE) {
                        if ($i > 0) {
                            $finalArray[$row[0]]["an"] = $row[1];
                            $finalArray[$row[0]]["mois"] = $row[2];
                            $finalArray[$row[0]]["jour"] = $row[3];
                            $finalArray[$row[0]]["hrmn"] = $row[4];
                            $finalArray[$row[0]]["lum"] = $row[5];
                            $finalArray[$row[0]]["agg"] = $row[6];
                            $finalArray[$row[0]]["int"] = $row[7]; //intR
                            $finalArray[$row[0]]["atm"] = $row[8];
                            $finalArray[$row[0]]["col"] = $row[9];
                            $finalArray[$row[0]]["com"] = $row[10];
                            $finalArray[$row[0]]["adr"] = utf8_decode($row[11]);
                            $finalArray[$row[0]]["gps"] = $row[12];
                            $finalArray[$row[0]]["lat"] = $row[13];
                            $finalArray[$row[0]]["long"] = $row[14]; //longR
                            $finalArray[$row[0]]["dep"] = $row[15];
                            $progressBar2->advance();
                        }
                        $i++;
                    }
                    $progressBar2->finish();
                    fclose($fp);
                }
                if (($fp = fopen("/app/src/Data/CSV/usagers_" . $year . ".csv", "r")) !== FALSE) {
                    $i = 0;
                    $output->writeln(PHP_EOL . '<fire2> - Import CSV des usagers</fire2>');
                    $progressBar3 = new ProgressBar($output);
                    $progressBar3->start();
                    while (($row = fgetcsv($fp, 1000, ",")) !== FALSE) {
                        if ($i > 0) {
                            $arrayUsagerTmp = [];
                            $arrayUsagerTmp["place"] = $row[1];
                            $arrayUsagerTmp["catu"] = $row[2];
                            $arrayUsagerTmp["grav"] = $row[3];
                            $arrayUsagerTmp["sexe"] = $row[4];
                            $arrayUsagerTmp["trajet"] = $row[5];
                            $arrayUsagerTmp["secu"] = $row[6];
                            $arrayUsagerTmp["locp"] = $row[7];
                            $arrayUsagerTmp["actp"] = $row[8];
                            $arrayUsagerTmp["etatp"] = $row[9];
                            $arrayUsagerTmp["an_nais"] = $row[10];
                            $arrayUsagerTmp["num_veh"] = $row[11];
                            $finalArray[$row[0]]["usagers"][] = $arrayUsagerTmp;
                            $progressBar3->advance();
                        }
                        $i++;
                    }
                    $progressBar3->finish();
                    fclose($fp);
                }
                if (($fp = fopen("/app/src/Data/CSV/vehicules_" . $year . ".csv", "r")) !== FALSE) {
                    $i = 0;
                    $output->writeln(PHP_EOL . '<fire2> - Import CSV des vehicules</fire2>');
                    $progressBar4 = new ProgressBar($output);
                    $progressBar4->start();
                    while (($row = fgetcsv($fp, 1000, ",")) !== FALSE) {
                        if ($i > 0) {
                            $arrayVehiculesTmp = [];
                            $arrayVehiculesTmp["senc"] = $row[1];
                            $arrayVehiculesTmp["catv"] = $row[2];
                            $arrayVehiculesTmp["occutc"] = $row[3];
                            $arrayVehiculesTmp["obs"] = $row[4];
                            $arrayVehiculesTmp["obsm"] = $row[5];
                            $arrayVehiculesTmp["choc"] = $row[6];
                            $arrayVehiculesTmp["manv"] = $row[7];
                            $arrayVehiculesTmp["num_veh"] = $row[8];
                            $finalArray[$row[0]]["vehicules"][] = $arrayVehiculesTmp;
                            $progressBar4->advance();
                        }
                        $i++;
                    }
                    $progressBar4->finish();
                    fclose($fp);
                }


                $output->writeln(PHP_EOL . '<fire2> - Insertion en base de données</fire2>');
                $progressBar5 = new ProgressBar($output, count($finalArray));
                $progressBar5->setFormat('very_verbose');

                $progressBar5->start();

                $entityManager = $this->container->get('doctrine')->getManager();

                $qb = $entityManager->createQueryBuilder();
                $qb->delete('App:Vehicules', 's');
                $qb->where('s.annee = :annee');
                $qb->setParameter('annee', $year);
                $qb->getQuery()->execute();

                $qb = $entityManager->createQueryBuilder();
                $qb->delete('App:Usagers', 's');
                $qb->where('s.annee = :annee');
                $qb->setParameter('annee', $year);
                $qb->getQuery()->execute();

                $qb = $entityManager->createQueryBuilder();
                $qb->delete('App:Accidents', 's');
                $qb->where('s.annee = :annee');
                $qb->setParameter('annee', $year);
                $qb->getQuery()->execute();

                $iterate = 0;
                foreach ($finalArray as $accidentId => $donnesAccident) {
                    $accidentEntity = new Accidents();
                    $accidentEntity->setId($accidentId);
                    $accidentEntity->setCatr($donnesAccident['catr']);
                    $accidentEntity->setVoie($donnesAccident['voie']);
                    $accidentEntity->setV1($donnesAccident['v1']);
                    $accidentEntity->setV2($donnesAccident['v2']);
                    $accidentEntity->setCirc($donnesAccident['circ']);
                    $accidentEntity->setNbv($donnesAccident['nbv']);
                    $accidentEntity->setPr($donnesAccident['pr']);
                    $accidentEntity->setPr1($donnesAccident['pr1']);
                    $accidentEntity->setVosp($donnesAccident['vosp']);
                    $accidentEntity->setProf($donnesAccident['prof']);
                    $accidentEntity->setPlan($donnesAccident['plan']);
                    $accidentEntity->setLartpc($donnesAccident['lartpc']);
                    $accidentEntity->setLarrout($donnesAccident['larrout']);
                    $accidentEntity->setSurf($donnesAccident['surf']);
                    $accidentEntity->setInfra($donnesAccident['infra']);
                    $accidentEntity->setSitu($donnesAccident['situ']);
                    $accidentEntity->setEnv1($donnesAccident['env1']);
                    $accidentEntity->setAn($donnesAccident['an']);
                    $accidentEntity->setMois($donnesAccident['mois']);
                    $accidentEntity->setJour($donnesAccident['jour']);
                    $accidentEntity->setHrmn($donnesAccident['hrmn']);
                    $accidentEntity->setLum($donnesAccident['lum']);
                    $accidentEntity->setAgg($donnesAccident['agg']);
                    $accidentEntity->setInt($donnesAccident['int']);
                    $accidentEntity->setAtm($donnesAccident['atm']);
                    $accidentEntity->setCol($donnesAccident['col']);
                    $accidentEntity->setCom($donnesAccident['com']);
                    $accidentEntity->setAdr($donnesAccident['adr']);
                    $accidentEntity->setGps($donnesAccident['gps']);
                    $accidentEntity->setLat($donnesAccident['lat']);
                    $accidentEntity->setLong($donnesAccident['long']);
                    $accidentEntity->setDep($donnesAccident['dep']);
                    $accidentEntity->setAnnee($year);

                    foreach ($donnesAccident['usagers'] as $index => $usager) {
                        $usagerEntity = new Usagers();
                        $usagerEntity->setPlace($usager['place']);
                        $usagerEntity->setCatu($usager['catu']);
                        $usagerEntity->setGrav($usager['grav']);
                        $usagerEntity->setSexe($usager['sexe']);
                        $usagerEntity->setTrajet($usager['trajet']);
                        $usagerEntity->setSecu($usager['secu']);
                        $usagerEntity->setLocp($usager['locp']);
                        $usagerEntity->setActp($usager['actp']);
                        $usagerEntity->setEtatp($usager['etatp']);
                        $usagerEntity->setAnNais($usager['an_nais']);
                        $usagerEntity->setNumVeh($usager['num_veh']);
                        $usagerEntity->setAnnee($year);
                        $entityManager->persist($usagerEntity);
                        $accidentEntity->addUsager($usagerEntity);
                    }

                    foreach ($donnesAccident['vehicules'] as $index => $vehicule) {
                        $vehiculeEntity = new Vehicules();
                        $vehiculeEntity->setSenc($vehicule['senc']);
                        $vehiculeEntity->setCatv($vehicule['catv']);
                        $vehiculeEntity->setOccutc($vehicule['occutc']);
                        $vehiculeEntity->setObs($vehicule['obs']);
                        $vehiculeEntity->setObsm($vehicule['obsm']);
                        $vehiculeEntity->setChoc($vehicule['choc']);
                        $vehiculeEntity->setManv($vehicule['manv']);
                        $vehiculeEntity->setNumVeh($vehicule['num_veh']);
                        $vehiculeEntity->setAnnee($year);
                        $entityManager->persist($vehiculeEntity);
                        $accidentEntity->addVehicule($vehiculeEntity);
                    }
                    $entityManager->persist($accidentEntity);
                    $iterate++;
                    if($iterate%$this->tailleLot === 0){
                        $entityManager->flush();
                    }
                    $progressBar5->advance();
                }
                $entityManager->flush();
                $progressBar5->finish();
            }
            $year++;
        }
        return 0;
    }
}
