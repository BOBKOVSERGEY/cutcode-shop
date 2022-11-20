<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class DomainCommand extends Command
{
    protected array $directories = [
        'Collections',
        'Actions',
        'Providers',
        'QueryBuilders'
    ];

    protected $signature = 'shop:domain';

    protected $description = 'Make domain';

    protected string $domain = '';

    public function handle(): int
    {
        $this->domain = ucfirst($this->ask('Domain name'));

        File::makeDirectory(base_path("src/Domain/$this->domain"));

        foreach ($this->directories as $dir) {
            File::makeDirectory(base_path("src/Domain/$this->domain/$dir"));
        }

        $this->registerServiceProvider();

        $this->registerRouteRegistrar();

        return self::SUCCESS;
    }

    protected function registerServiceProvider(): void
    {
        $this->makeDomainServiceProvider($this->domain, 'service_provider');
        $this->makeDomainServiceProvider('Actions', 'actions_service_provider');

        $domainProviderPath = app_path('Providers/DomainServiceProvider.php');

        $domainProvider = file_get_contents($domainProviderPath);

        if (Str::contains(
            $domainProvider,
            'Domain\\'.$this->domain.'\\Providers\\'.$this->domain.'ServiceProvider'
        )) {
            return;
        }

        file_put_contents($domainProviderPath, preg_replace(
            '/public function register\(\): void\n+\s+\{\n+/m',
            $this->registerMethodSignature() . $this->appRegister($this->domain),
            $domainProvider
        ));
    }

    protected function registerRouteRegistrar(): void
    {
        $this->makeRouteRegistrar();

        $routeProviderPath = app_path('Providers/RouteServiceProvider.php');

        $routeProvider = file_get_contents($routeProviderPath);

        if (Str::contains(
            $routeProvider,
            'App\\Routing\\'.$this->domain.'Registrar'
        )) {
            return;
        }

        file_put_contents($routeProviderPath, preg_replace(
            '/protected array \$registrars = \[\n\s+/m',
            'protected array $registrars = ['.PHP_EOL
            .$this->tab(2)
            .'\App\Routing\\'.$this->domain.'Registrar::class,'.PHP_EOL
            .$this->tab(2),
            $routeProvider
        ));
    }

    protected function makeRouteRegistrar(): void
    {
        file_put_contents(
            app_path("Routing/{$this->domain}Registrar.php"),
            str_replace(
                "{{Domain}}",
                $this->domain,
                file_get_contents(base_path("stubs/domain/route_registrar.stub"))
            )
        );
    }

    protected function makeDomainServiceProvider(string $name, string $stub): void
    {
        file_put_contents(
            base_path("src/Domain/$this->domain/Providers/{$name}ServiceProvider.php"),
            str_replace(
                "{{Domain}}",
                $this->domain,
                file_get_contents(base_path("stubs/domain/$stub.stub"))
            )
        );
    }

    protected function registerMethodSignature(): string
    {
        return 'public function register(): void'.PHP_EOL.'    {'.PHP_EOL;
    }

    protected function appRegister(string $prefix): string
    {
        return $this->tab(2).'$this->app->register('.PHP_EOL.
            $this->tab(3)."\\Domain\\$prefix\\Providers\\{$prefix}ServiceProvider::class".PHP_EOL.
            $this->tab(2).');'.PHP_EOL.PHP_EOL;
    }

    protected function tab(int $tabCount = 1): string
    {
        return str_repeat(' ', $tabCount * 4);
    }
}
