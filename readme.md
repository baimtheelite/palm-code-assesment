# Palm Code Assesment


## Requirements
Docker
Nginx
PHP 8.3


## Installation
	
Build and start docker container
  `npm run docker:start` or `cd laradock-palm-code-admin && docker compose up -d nginx `

Enter Docker workspace
`npm run docker:workspace` or  `cd laradock-palm-code-admin && docker compose exec --user=laradock workspace bash`
  `composer install`
  `php artisan storage:link`
   `php artisan migrate --seed`
