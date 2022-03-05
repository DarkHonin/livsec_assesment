# Liv Security - Technical assessment
#### Project Author: William Gourley
## Premise
In conjunction with a job search one of the opportunities have provided me with this project as technical assessment in my skills regarding php, Laravel and Vue. 

Along with user registration and authentication the endeavor also requires a list of groceries each containing; Name, quantity description and checked status; tied to each unique user. These items should offer CRUD operations via an API for manipulation by any form of fronted. 

## Notes
It has been some time since I have touched on php and took some time to get the project spun up. What had been a simple include library when I last looked, Laravel has become more complex leveraging Docker to serve all its infrastructure such as Database and Mail server.

In addition to the increased complexity in its deployment there is also integration for 3rd party javascript library integration into the Blade template engine. This confused me a little as I am use to the system only rendering and serving html without any dynamic elements present.

## Conclusion
I enjoyed working on the project more than setting up the environment, but once the environment had been configured it was smooth sailing. I implemented the boilerplate authentication system and built the rest from there. 

Email verification is disabled at this time seeing as this project should never see a public deployment and doesn't need that security yet.