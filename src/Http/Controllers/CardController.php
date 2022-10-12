<?php

namespace Formfeed\ResourceCards\Http\Controllers;

use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Http\Requests\DashboardRequest;
use Illuminate\Routing\Controller;

class CardController extends Controller {

    
    public function __invoke(NovaRequest $request)
    {
        if ($request->input("display") === "dashboard") {
            $request = DashboardRequest::createFrom($request);
            $dashboard = $request->route()->parameter("resource", "main");
            return $request->availableCards($dashboard);
        }

        $resource = $request->newResource();
        $cards = $resource->resolveCards($request)->filter->authorize($request)->values();
        return response()->json(
            $cards
        );
    }
}