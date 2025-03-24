module.exports = {
  apps: [{
    name: "laravel-serve",
    script: "php",
    args: "artisan serve",
    cwd: "/home/pi/the-wedding-invitation",
    instances: 1,
    autorestart: true,
    watch: false
  }, {
    name: "vite-dev",
    script: "npm",
    args: "run dev",
    cwd: "/home/pi/the-wedding-invitation",
    instances: 1,
    autorestart: true,
    watch: false
  }]
};
