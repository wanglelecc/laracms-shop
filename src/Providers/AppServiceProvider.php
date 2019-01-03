<?php
/**
 * LaraCMS - CMS based on laravel
 *
 * @category  LaraCMS
 * @package   Laravel
 * @author    Wanglelecc <wanglelecc@gmail.com>
 * @date      2018/06/06 09:08:00
 * @copyright Copyright 2018 LaraCMS
 * @license   https://opensource.org/licenses/MIT
 * @github    https://github.com/wanglelecc/laracms
 * @link      https://www.laracms.cn
 * @version   Release 1.0
 */

namespace Wanglelecc\Laracms\Shop\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Wanglelecc\Laracms\Models\Setting;
use Wanglelecc\Laracms\Handlers\AdministratorMenuHandler;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
	{
	    // 注册模型观察者
//		\Wanglelecc\Laracms\Models\User::observe(                  \Wanglelecc\Laracms\Observers\UserObserver::class);
		\Wanglelecc\Laracms\Shop\Models\Category::observe(                  \Wanglelecc\Laracms\Shop\Observers\CategoryObserver::class);

		

        // 检测是否在命令行模式
        if ($this->app->runningInConsole()) {
           // 命令行模式
        }
        else{
            // 非命令行模式
            Setting::afflux();
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
