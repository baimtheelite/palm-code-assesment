# Palm Code Assesment


## Requirements
- Docker
- Nginx
- PHP 8.3
- SQLite Database (Could be change to MySQL/Postgres in .env)


## Installation
	
Build and start docker container

  `npm run docker:start` or `cd laradock-palm-code-admin && docker compose up -d nginx `

Enter Docker workspace

`npm run docker:workspace` or  
`cd laradock-palm-code-admin && docker compose exec --user=laradock workspace bash`

`cp .env.example .env`

`composer install`

`npm install && npm run build`

`php artisan key:generate`

`php artisan storage:link`

`php artisan migrate --seed`

## Demo

Account Login:

Email: super_admin@example.com

Password: password

To gain all permissions for super_admin role, follow this step below:

Go to Roles -> Edit "super_admin" role -> Select All -> Save Changes

