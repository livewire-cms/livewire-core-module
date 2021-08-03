<?php namespace Modules\LivewireCore\Support\Facades;

use Illuminate\Support\Facades\Facade;


/**
 * @method static bool check()
 * @method static array all(string $format = null)
 * @method static array get(string $key, string $format = null)
 * @method static array|\Modules\LivewireCore\Flash\FlashBag error(string $message = null)
 * @method static array|\Modules\LivewireCore\Flash\FlashBag success(string $message = null)
 * @method static array|\Modules\LivewireCore\Flash\FlashBag warning(string $message = null)
 * @method static array|\Modules\LivewireCore\Flash\FlashBag info(string $message = null)
 * @method static \Modules\LivewireCore\Flash\FlashBag add(string $key, string $message)
 * @method static void store()
 * @method static void forget(string $key = null)
 * @method static void purge();
 *
 * @see \Modules\LivewireCore\Flash\FlashBag
 */
class Flash extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'flash';
    }
}
