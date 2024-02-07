<?php
namespace szymcode\sentry_substitute;
use Exception;
use Throwable;
use Illuminate\Support\Facades\Http;
class ErrorHandling
{
    public static function getErrorMessage(Throwable $error)
    {
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);
        $file = $backtrace[0]['file'];
        $line = $backtrace[0]['line'];
        $message = $error->getMessage() . " ( File:" . $file . ", Line:" . $line . " )";
        try {
            $data = [
                "message" => $message
            ];
            Http::post('host.docker.internal/api/errors', $data);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ]);
        }
        return $message;
    }
}
