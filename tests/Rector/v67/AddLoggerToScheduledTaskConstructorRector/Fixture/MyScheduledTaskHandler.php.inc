<?php declare(strict_types=1);

namespace Frosh\Rector\Tests\Rector\v67\AddLoggerToScheduledTaskConstructorRector\Fixture;

use Allincart\Core\Framework\DataAbstractionLayer\EntityRepository;
use Allincart\Core\Framework\MessageQueue\ScheduledTask\ScheduledTaskHandler;

class MyScheduledTaskHandler extends ScheduledTaskHandler
{
    public function __construct(EntityRepository $scheduledTaskRepository) {
        parent::__construct($scheduledTaskRepository);
    }

    public function run(): void {}
}
?>
-----
<?php declare(strict_types=1);

namespace Frosh\Rector\Tests\Rector\v67\AddLoggerToScheduledTaskConstructorRector\Fixture;

use Psr\Log\LoggerInterface;
use Allincart\Core\Framework\DataAbstractionLayer\EntityRepository;
use Allincart\Core\Framework\MessageQueue\ScheduledTask\ScheduledTaskHandler;

class MyScheduledTaskHandler extends ScheduledTaskHandler
{
    public function __construct(EntityRepository $scheduledTaskRepository, LoggerInterface $exceptionLogger) {
        parent::__construct($scheduledTaskRepository, $exceptionLogger);
    }

    public function run(): void {}
}
?>
