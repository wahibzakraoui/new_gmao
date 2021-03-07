<?php /** @noinspection PhpComposerExtensionStubsInspection */

namespace App\Exceptions;

use Exception;
use HttpException;
use Throwable;

class PermissionDeniedException extends Exception
{
    /**
     * @param $request
     * @return HttpException
     * @noinspection PhpVoidFunctionResultUsedInspection
     * @noinspection PhpIncompatibleReturnTypeInspection
     */
    public function render($request): HttpException
    {
        return abort(403);
    }
}
