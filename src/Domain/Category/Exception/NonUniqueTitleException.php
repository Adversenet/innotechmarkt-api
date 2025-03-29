<?php

declare(strict_types=1);

namespace Domain\Category\Exception;

use Domain\Shared\Exception\SafeMessageException;
use Throwable;

/**
 * class NonUniqueTitleException
 */
class NonUniqueTitleException extends SafeMessageException
{
    protected string $messageDomain = 'category';

    /**
     * This method is used to set a message that will be shown to the user.
     *
     * @param string $message
     * @param array $messageData
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(
        string $message = 'category.exceptions.non_unique_title',
        array $messageData = [],
        int $code = 0,
        Throwable $previous = null
    ) {
        parent::__construct($message, $messageData, $code, $previous);
    }
}