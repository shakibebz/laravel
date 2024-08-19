<p align="center"><img src="pic.jpg" width="400" alt="Laravel Logo"></p>


## About This little project

It is simple sample web application based on Laravel framework which has common tasks that are using in many web projects, such as:

- Implemented RESTful APIs endpoints.
- For authentication, Laravel Passport has been used (Barear Token).
- Each article has it's own category (relations).
- It shows two articles in each page and has a link to next page (Paginate).
- Seeds the article table with sample data (Seeder).
- The API/ChatController has some functions that loads from ChatHelper and uses Query Builder.

 ***AWS***

- Configured an AWS EC2 instance to host the Laravel application.
- Use RDS for the database backend.


## How to use

First, register a user using {api/auth/register} and send email, name, password, confirm password parametrs. Then, log-in with {api/auth/login} endpoint.
It will return a token that you should use it as a barear token in every single request. Run the migrations and seed the article table using seeder.

If you want to see this project on an AWS host, let me know because I use free tiar plan for this project and it has limited time so I haved to stop
the ec2 intance whenever I'm not using it. I can run the instance for you to check and send you the ec2 intance's IP.
