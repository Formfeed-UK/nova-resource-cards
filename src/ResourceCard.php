<?php

namespace Formfeed\ResourceCards;

use Laravel\Nova\Card;

class ResourceCard extends Card {

    // Prevent card from appearing in normal card spots
    public $onlyOnDetail = null;

     /**
     * Indicates if the element should be shown on the index view.
     *
     * @var (callable():bool)|bool
     */
    public $showOnIndex = true;

    /**
     * Indicates if the element should be shown on the detail view.
     *
     * @var (callable():bool)|bool
     */
    public $showOnDetail = true;

    /**
     * Indicates if the element should be shown on the creation view.
     *
     * @var (callable(\Laravel\Nova\Http\Requests\NovaRequest):bool)|bool
     */
    public $showOnCreation = true;

    /**
     * Indicates if the element should be shown on the update view.
     *
     * @var (callable(\Laravel\Nova\Http\Requests\NovaRequest, mixed):bool)|bool
     */
    public $showOnUpdate = true;

    /**
     * Indicates if the element should be shown on the attach view.
     *
     * @var (callable(\Laravel\Nova\Http\Requests\NovaRequest, mixed):bool)|bool
     */
    public $showOnAttach = true;

    /**
     * Indicates if the element should be shown on the replicate view.
     *
     * @var (callable(\Laravel\Nova\Http\Requests\NovaRequest, mixed):bool)|bool
     */
    public $showOnReplicate = true;

    /**
     * Indicates if the element should be shown on the lens view.
     *
     * @var (callable(\Laravel\Nova\Http\Requests\NovaRequest, mixed):bool)|bool
     */
    public $showOnLens = true;

    /**
     * Specify that the element should be hidden from the index view.
     *
     * @param  (callable():bool)|bool  $callback
     * @return $this
     */
    public function hideFromIndex($callback = true)
    {
        $this->showOnIndex = is_callable($callback) ? function () use ($callback) {
            return ! call_user_func_array($callback, func_get_args());
        }
        : ! $callback;

        return $this;
    }

    /**
     * Specify that the element should be hidden from the lens view.
     *
     * @param  (callable():bool)|bool  $callback
     * @return $this
     */
    public function hideFromLens($callback = true)
    {
        $this->showOnLens = is_callable($callback) ? function () use ($callback) {
            return ! call_user_func_array($callback, func_get_args());
        }
        : ! $callback;

        return $this;
    }

    /**
     * Specify that the element should be hidden from the detail view.
     *
     * @param  (callable():bool)|bool  $callback
     * @return $this
     */
    public function hideFromDetail($callback = true)
    {
        $this->showOnDetail = is_callable($callback) ? function () use ($callback) {
            return ! call_user_func_array($callback, func_get_args());
        }
        : ! $callback;

        return $this;
    }

    /**
     * Specify that the element should be hidden from the creation view.
     *
     * @param  (callable():bool)|bool  $callback
     * @return $this
     */
    public function hideWhenCreating($callback = true)
    {
        $this->showOnCreation = is_callable($callback) ? function () use ($callback) {
            return ! call_user_func_array($callback, func_get_args());
        }
        : ! $callback;

        return $this;
    }

    /**
     * Specify that the element should be hidden from the update view.
     *
     * @param  (callable():bool)|bool  $callback
     * @return $this
     */
    public function hideWhenUpdating($callback = true)
    {
        $this->showOnUpdate = is_callable($callback) ? function () use ($callback) {
            return ! call_user_func_array($callback, func_get_args());
        }
        : ! $callback;

        return $this;
    }

    /**
     * Specify that the element should be hidden from the replicate view.
     *
     * @param  (callable():bool)|bool  $callback
     * @return $this
     */
    public function hideWhenReplicating($callback = true)
    {
        $this->showOnReplicate = is_callable($callback) ? function () use ($callback) {
            return ! call_user_func_array($callback, func_get_args());
        }
        : ! $callback;

        return $this;
    }

        /**
     * Specify that the element should be hidden from the attach view.
     *
     * @param  (callable():bool)|bool  $callback
     * @return $this
     */
    public function hideWhenAttaching($callback = true)
    {
        $this->showOnAttach = is_callable($callback) ? function () use ($callback) {
            return ! call_user_func_array($callback, func_get_args());
        }
        : ! $callback;

        return $this;
    }



    /**
     * Specify that the element should be hidden from the index view.
     *
     * @param  (callable():bool)|bool  $callback
     * @return $this
     */
    public function showOnIndex($callback = true)
    {
        $this->showOnIndex = $callback;

        return $this;
    }

    /**
     * Specify that the element should be hidden from the lens view.
     *
     * @param  (callable():bool)|bool  $callback
     * @return $this
     */
    public function showOnLens($callback = true)
    {
        $this->showOnLens = $callback;

        return $this;
    }

    /**
     * Specify that the element should be hidden from the detail view.
     *
     * @param  (callable():bool)|bool  $callback
     * @return $this
     */
    public function showOnDetail($callback = true)
    {
        $this->showOnDetail = $callback;

        return $this;
    }

    /**
     * Specify that the element should be hidden from the creation view.
     *
     * @param  (callable(\Laravel\Nova\Http\Requests\NovaRequest):bool)|bool  $callback
     * @return $this
     */
    public function showOnCreating($callback = true)
    {
        $this->showOnCreation = $callback;

        return $this;
    }

    /**
     * Specify that the element should be hidden from the update view.
     *
     * @param  (callable(\Laravel\Nova\Http\Requests\NovaRequest, mixed):bool)|bool  $callback
     * @return $this
     */
    public function showOnUpdating($callback = true)
    {
        $this->showOnUpdate = $callback;

        return $this;
    }

        /**
     * Specify that the element should be hidden from the replicate view.
     *
     * @param  (callable(\Laravel\Nova\Http\Requests\NovaRequest, mixed):bool)|bool  $callback
     * @return $this
     */
    public function showOnReplicate($callback = true)
    {
        $this->showOnReplicate = $callback;

        return $this;
    }

        /**
     * Specify that the element should be hidden from the attach view.
     *
     * @param  (callable(\Laravel\Nova\Http\Requests\NovaRequest, mixed):bool)|bool  $callback
     * @return $this
     */
    public function showOnAttach($callback = true)
    {
        $this->showOnAttach = $callback;

        return $this;
    }

    /**
     * Check for showing when updating.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  mixed  $resource
     * @return bool
     */
    public function isShownOnUpdate(NovaRequest $request, $resource): bool
    {
        if (is_callable($this->showOnUpdate)) {
            $this->showOnUpdate = call_user_func($this->showOnUpdate, $request, $resource);
        }

        return $this->showOnUpdate;
    }

    /**
     * Check showing on index.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  mixed  $resource
     * @return bool
     */
    public function isShownOnIndex(NovaRequest $request, $resource): bool
    {
        if (is_callable($this->showOnIndex)) {
            $this->showOnIndex = call_user_func($this->showOnIndex, $request, $resource);
        }

        return $this->showOnIndex;
    }

        /**
     * Check showing on Lens.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  mixed  $resource
     * @return bool
     */
    public function isShownOnLens(NovaRequest $request, $resource): bool
    {
        if (is_callable($this->showOnLens)) {
            $this->showOnLens = call_user_func($this->showOnLens, $request, $resource);
        }

        return $this->showOnLens;
    }

    /**
     * Determine if the field is to be shown on the detail view.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  mixed  $resource
     * @return bool
     */
    public function isShownOnDetail(NovaRequest $request, $resource): bool
    {
        if (is_callable($this->showOnDetail)) {
            $this->showOnDetail = call_user_func($this->showOnDetail, $request, $resource);
        }

        return $this->showOnDetail;
    }

    /**
     * Determine if the field is to be shown in the preview modal.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  mixed  $resource
     * @return bool
     */
    public function isShownOnPreview(NovaRequest $request, $resource): bool
    {
        return $this->showOnPreview;
    }

    /**
     * Check for showing when creating.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return bool
     */
    public function isShownOnCreation(NovaRequest $request): bool
    {
        if (is_callable($this->showOnCreation)) {
            $this->showOnCreation = call_user_func($this->showOnCreation, $request);
        }

        return $this->showOnCreation;
    }

    /**
     * Check for showing when replicating.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return bool
     */
    public function isShownOnReplicate(NovaRequest $request): bool
    {
        if (is_callable($this->showOnReplicate)) {
            $this->showOnReplicate = call_user_func($this->showOnReplicate, $request);
        }

        return $this->showOnReplicate;
    }

    /**
     * Check for showing when attaching.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return bool
     */
    public function isShownOnAttach(NovaRequest $request): bool
    {
        if (is_callable($this->showOnAttach)) {
            $this->showOnAttach = call_user_func($this->showOnAttach, $request);
        }

        return $this->showOnAttach;
    }

    /**
     * Specify that the element should only be shown on the index view.
     *
     * @return $this
     */
    public function onlyOnIndex()
    {
        $this->showOnIndex = true;
        $this->showOnDetail = false;
        $this->showOnCreation = false;
        $this->showOnUpdate = false;
        $this->showOnReplicate = false;
        $this->showOnAttach = false;
        $this->showOnLens = false;

        return $this;
    }

        /**
     * Specify that the element should only be shown on the lens view.
     *
     * @return $this
     */
    public function onlyOnLens()
    {
        $this->showOnIndex = false;
        $this->showOnDetail = false;
        $this->showOnCreation = false;
        $this->showOnUpdate = false;
        $this->showOnReplicate = false;
        $this->showOnAttach = false;
        $this->showOnLens = true;

        return $this;
    }

    /**
     * Specify that the element should only be shown on the detail view.
     *
     * @return $this
     */
    public function onlyOnDetail()
    {
        parent::onlyOnDetail();

        $this->showOnIndex = false;
        $this->showOnDetail = true;
        $this->showOnCreation = false;
        $this->showOnUpdate = false;
        $this->showOnReplicate = false;
        $this->showOnAttach = false;
        $this->showOnLens = false;

        return $this;
    }

    /**
     * Specify that the element should only be shown on forms.
     *
     * @return $this
     */
    public function onlyOnForms()
    {
        $this->showOnIndex = false;
        $this->showOnDetail = false;
        $this->showOnCreation = true;
        $this->showOnUpdate = true;
        $this->showOnReplicate = true;
        $this->showOnAttach = true;
        $this->showOnLens = false;

        return $this;
    }

    /**
     * Specify that the element should be hidden from forms.
     *
     * @return $this
     */
    public function exceptOnForms()
    {
        $this->showOnIndex = true;
        $this->showOnDetail = true;
        $this->showOnCreation = false;
        $this->showOnUpdate = false;
        $this->showOnReplicate = false;
        $this->showOnAttach = false;
        $this->showOnLens = true;

        return $this;
    }

    public function jsonSerialize(): array {
        $jsonReturn = array_merge([
            "resourceCard" => true,
            "showOnIndex" => $this->showOnIndex,
            "showOnDetail" => $this->showOnDetail,
            "showOnCreation" => $this->showOnCreation,
            "showOnUpdate" => $this->showOnUpdate,
            "showOnAttach" => $this->showOnAttach,
            "showOnReplicate" => $this->showOnReplicate,
            "showOnLens" => $this->showOnLens,
        ], parent::jsonSerialize());
        $jsonReturn['onlyOnDetail'] = null;
        return $jsonReturn;
    }
}
