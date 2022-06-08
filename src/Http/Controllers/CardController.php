<?php

namespace Formfeed\ResourceCards\Http\Controllers;

use Laravel\Nova\Http\Requests\NovaRequest;
use Illuminate\Routing\Controller;

class CardController extends Controller {

    public function __invoke(NovaRequest $request)
    {
        $resource = $request->newResource();
        $cards = $resource->resolveCards($request)->filter->authorize($request)->values();
        return response()->json(
            $cards
        );
    }
}