module.exports = {
    apps: [
        {
            name: "laravel-serve",
            script: "php",
            args: "artisan serve --host=0.0.0.0",
            cwd: "/home/pi/the-wedding-invitation",
            interpreter: "",
            instances: 1,
            autorestart: true,
            watch: false,
        },
        {
            name: "vite-dev",
            script: "npm",
            args: "run dev -- --host",
            cwd: "/home/pi/the-wedding-invitation",
            interpreter: "",
            instances: 1,
            autorestart: true,
            watch: false,
        },
    ],
};
