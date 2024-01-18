<?php

namespace App\Enums;

use Mokhosh\FilamentKanban\Concerns\IsKanbanStatus;

enum TaskStatusEnum: int
{
	use IsKanbanStatus;

	case DO_TO = 1;
	case IN_PROGRESS = 2;
	case TO_REVIEW = 3;
	case CORRECTION = 4;
	case IMPEDIMENT = 5;
}
