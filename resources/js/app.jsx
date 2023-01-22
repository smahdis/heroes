// import './bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import "../css/app.css";

import React from "react";
import { render } from "react-dom";
import { createInertiaApp } from "@inertiajs/inertia-react";
import { InertiaProgress } from "@inertiajs/progress";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import {ThemeProvider} from "react-bootstrap";

const appName =
    window.document.getElementsByTagName("title")[0]?.innerText || "My Great Heroes";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.jsx`,
            import.meta.glob("./Pages/**/*.jsx")
        ),
    setup({ el, App, props }) {
        return render(
            <ThemeProvider
                breakpoints={['xxxl', 'xxl', 'xl', 'lg', 'md', 'sm', 'xs', 'xxs']}
                minBreakpoint="xxs"
            >
                <App {...props} />
            </ThemeProvider>
            , el
        );
    },
});

// you can specify any color of choice
InertiaProgress.init({ color: "#4B5563" });
