Nova.booting(app => {
    app.component('ResourceCards', require("./components/cards/Cards").default);

    Nova.inertia("Original.Nova.Detail", Nova.pages["Nova.Detail"]);
    Nova.inertia("Original.Nova.Update", Nova.pages["Nova.Update"]);
    Nova.inertia("Original.Nova.Create", Nova.pages["Nova.Create"]);
    Nova.inertia("Original.Nova.Index", Nova.pages["Nova.Index"]);
    Nova.inertia("Original.Nova.Attach", Nova.pages["Nova.Attach"]);
    Nova.inertia("Original.Nova.UpdateAttached", Nova.pages["Nova.UpdateAttached"]);
    Nova.inertia("Original.Nova.Replicate", Nova.pages["Nova.Replicate"]);
    Nova.inertia("Original.Nova.Lens", Nova.pages["Nova.Lens"]);

    Nova.inertia("Nova.Detail", require("./components/pages/Detail").default);
    Nova.inertia("Nova.Update", require("./components/pages/Update").default);
    Nova.inertia("Nova.Create", require("./components/pages/Create").default);
    Nova.inertia("Nova.Index", require("./components/pages/Index").default);
    Nova.inertia("Nova.Attach", require("./components/pages/Attach").default);
    Nova.inertia("Nova.UpdateAttached", require("./components/pages/UpdateAttached").default);
    Nova.inertia("Nova.Lens", require("./components/pages/Lens").default);



})
