#Installation
- Laravel server
1. Go to the file folder terminal and run 'composer install'
- This to install the vendor file folder that my need the application
2. Once finish run the application with 'php artisan serve --port=8000'
3. Using port 8000 is set to our client side once called

- Angular client
1. Go to the file folder terminal and run 'npm install'
- This to installs all node_modules from package.json that will run the application
2. Run the application by 'ng serve --open' and it will create localhost:4200 and directly open to browser

#Summary of the System
#The system is contains of weather & place information within Japan and specific city
Backend tech: PHP (using Laravel Framework)
Frontend tech: Typescipt (Angular CLI 16 Framework)

Why use Laravel as REST API?
- This API get data to external api such as weather forecast & Japan chosen city place details
- It set as service-repository pattern design this is to easily maintain & debug the code
- Has so many pre-built function that may use in development
- And this framework is light-weight and easy to use

Why use Angular as Client-side
- Angular has provide file structured
- Easily to maintain
- I used standalone components to boost the performance of the page
