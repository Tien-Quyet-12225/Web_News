<?php

namespace App\Console\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeMiddleware extends Command
{
    protected function configure()
    {
        $this
            ->setName('make:middleware')
            ->setDescription('Create a new middleware')
            ->addArgument('name', InputArgument::REQUIRED, 'The name of the middleware');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $name = $input->getArgument('name');
        $path = __DIR__ . '/../../middleware/' . $name . '.php';

        if (file_exists($path)) {
            $output->writeln("<error>middleware {$name} already exists!</error>");
            return Command::FAILURE;
        }

        $stub = $this->getStub();
        $stub = str_replace('{{middlewareName}}', $name, $stub);

        if (!file_put_contents($path, $stub)) {
            $output->writeln("<error>Failed to create middleware {$name}.</error>");
            return Command::FAILURE;
        }

        $output->writeln("<info>middleware {$name} created successfully.</info>");
        return Command::SUCCESS;
    }

    protected function getStub()
    {
        return <<<EOT
<?php

namespace App\Middleware;

class {{middlewareName}}
{
    public function __invoke(\$request, \$next)
    {

        return \$next(\$request);
    }
}
EOT;
    }
}