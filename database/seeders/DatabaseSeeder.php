<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Mark',
            'username' => 'Mark98',
            'email' => 'mark98@devblog.com',
            'password' => Hash::make('Mark12345$'),
            'role_id' => 3
        ]);

        User::create([
            'name' => 'Andrew',
            'username' => 'Andrew96',
            'email' => 'andrew96@devblog.com',
            'password' => Hash::make('Andrew12345$'),
            'role_id' => 2
        ]);

        User::create([
            'name' => 'John',
            'username' => 'John97',
            'email' => 'john97@devblog.com',
            'password' => Hash::make('John12345$'),
            'role_id' => 1
        ]);

        $roles = [
        [
            'role' => 'user',
            'description' => 'user'
        ],
        [
            'role' => 'loader',
            'description' => 'loader'
        ],
        [
            'role' => 'admin',
            'description' => 'admin'
        ]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }

        $tags = [
        [
            'tag' => 'Programming languages'
        ],
        [
            'tag' => 'Frameworks'
        ],
        [
            'tag' => 'Tools'
        ],
        [
            'tag' => 'Best practices'
        ],
        [
            'tag' => 'Web development'
        ],
        [
            'tag' => 'Back-end development'
        ],
        [
            'tag' => 'Mobile development'
        ],
        [
            'tag' => 'DevOps'
        ],
        [
            'tag' => 'Artificial intelligence and machine learning'
        ],
        [
            'tag' => 'Career advice and job search tips'
        ]
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }

        $posts = [
        [
            'title' => '5 Tips for Writing More Secure Code',
            'short' => 'In this post, you could share some best practices for writing secure code, such as using parameterized queries, validating user input, and encrypting sensitive data.',
            'content' => "
            As a developer, writing secure code is an essential part of your job. With cyber attacks becoming more and more common, it's critical to ensure that your code is as secure as possible. In this post, we'll cover five tips for writing more secure code that will help you to protect your application and its users.

            1. Use Parameterized Queries

            One of the most common ways that attackers can exploit a web application is through SQL injection attacks. By using parameterized queries, you can help to prevent these attacks by ensuring that user input is properly sanitized before it is used in a database query.

            2. Validate User Input

            Another way that attackers can exploit a web application is through cross-site scripting (XSS) attacks. By validating user input, you can help to prevent these attacks by ensuring that user input is free of malicious code.

            3. Encrypt Sensitive Data

            If your application stores sensitive data such as passwords or credit card information, it's important to encrypt that data to prevent it from being accessed by attackers. One way to do this is to use a cryptographic hash function such as bcrypt to store passwords securely.

            4. Implement Access Control

            Access control is a way to ensure that users can only access the parts of your application that they are authorized to use. This can help to prevent attacks such as privilege escalation, where an attacker gains access to parts of the application that they should not be able to access.

            5. Keep Your Dependencies Up-to-Date

            Finally, it's important to keep your application's dependencies up-to-date to ensure that any security vulnerabilities are patched as soon as possible. Make sure to regularly update your dependencies and monitor for any security advisories that may affect your application.

            By following these five tips, you can help to ensure that your code is as secure as possible. Remember, security is an ongoing process, and it's important to stay vigilant and keep up-to-date with the latest security best practices.
            ",
            'user_id' => 2
        ],
        [
            'title' => 'How to Optimize Your Website for Speed',
            'short' => 'This post could cover some techniques for optimizing website performance, such as minifying code, compressing images, and using a content delivery network (CDN).',
            'content' => "
            In today's fast-paced digital world, website speed is more important than ever. Users expect websites to load quickly, and if your site takes too long to load, you risk losing visitors and potential customers. In this post, we'll cover some tips for optimizing your website for speed, so you can keep your visitors happy and engaged.

            1. Minify Your Code

            One of the easiest ways to speed up your website is to minify your code. Minification removes unnecessary characters such as whitespace, comments, and line breaks from your HTML, CSS, and JavaScript files, reducing their size and improving load times.

            There are several tools available that can help you to minify your code, such as the YUI Compressor, the Closure Compiler, and the UglifyJS.

            2. Compress Your Images

            Images are often the largest files on a web page, so it's important to optimize them for size. One way to do this is to compress your images using a tool like Adobe Photoshop or GIMP.

            Another option is to use an online image optimization tool such as TinyPNG or Compressor.io. These tools can compress your images without sacrificing quality, helping to reduce their file size and improve load times.

            3. Use a Content Delivery Network (CDN)

            A content delivery network (CDN) is a network of servers located in different geographic locations that work together to deliver your website's content more quickly. When a user requests a page from your website, the CDN will serve the content from the server that is closest to the user, reducing the distance that the data has to travel and improving load times.

            There are several CDN providers available, including Cloudflare, Akamai, and Amazon CloudFront.

            4. Leverage Browser Caching

            When a user visits your website, their browser downloads all of the necessary files, including images, CSS files, and JavaScript files. By leveraging browser caching, you can instruct the user's browser to store these files locally, so they don't have to be downloaded again on subsequent visits.

            To enable browser caching, you can add a Cache-Control header to your HTTP responses, specifying how long the browser should store the files. For example, you could set the header to 'max-age=86400', which would instruct the browser to store the files for 24 hours.

            5. Minimize HTTP Requests
            Finally, it's important to minimize the number of HTTP requests that your website makes. Each time a user visits your site, their browser has to make requests for all of the necessary files, including images, CSS files, and JavaScript files. The more requests that your site makes, the longer it will take to load.

            To minimize HTTP requests, you can combine multiple files into a single file. For example, you could combine all of your CSS files into a single file, and all of your JavaScript files into a single file. This will reduce the number of requests that the browser has to make, improving load times.

            By following these tips, you can help to optimize your website for speed and improve the user experience for your visitors. Remember, website speed is critical in today's digital world, so it's important to make it a priority.
            ",
            'user_id' => 2
        ],
        [
            'title' => 'The Pros and Cons of Different Web Frameworks',
            'short' => 'In this post, you could compare and contrast popular web frameworks such as React, Vue.js, and Angular, discussing their strengths and weaknesses.',
            'content' => "
            Web frameworks are an essential part of web development. They provide a set of tools and libraries that simplify the development process and enable developers to create complex web applications with ease. However, with so many different web frameworks available, it can be challenging to choose the right one for your project. In this post, we'll explore the pros and cons of different web frameworks to help you make an informed decision.

            What are Web Frameworks?

            Web frameworks are a set of libraries, tools, and conventions that make it easier for developers to build web applications. They provide pre-built components that simplify the development process and allow developers to focus on writing code for the specific functionality of their application.

            Web frameworks can be divided into two categories: server-side frameworks and client-side frameworks. Server-side frameworks such as Django, Ruby on Rails, and Laravel provide tools and libraries for creating the server-side of web applications. On the other hand, client-side frameworks such as React, Angular, and Vue.js provide tools and libraries for creating the front-end or client-side of web applications.

            Pros and Cons of Different Web Frameworks

            1. Django

            Pros:

            Django is a popular Python-based framework that has a robust set of tools and libraries for building web applications quickly and easily.
            It has a powerful ORM (Object Relational Mapper) that simplifies database management.
            It has excellent documentation and a large community of developers who contribute to its development.

            Cons:

            Django can be challenging to learn for developers who are not familiar with Python.
            It can be challenging to customize Django to meet specific project requirements.

            2. Ruby on Rails

            Pros:

            Ruby on Rails is a popular framework that provides a set of tools and conventions for building web applications quickly and easily.
            It has a powerful ORM that simplifies database management.
            It has excellent documentation and a large community of developers who contribute to its development.

            Cons:

            Ruby on Rails can be slow to run, particularly for complex applications.
            It can be challenging to customize Ruby on Rails to meet specific project requirements.

            3. Laravel

            Pros:

            Laravel is a popular PHP-based framework that has a robust set of tools and libraries for building web applications quickly and easily.
            It has a powerful ORM that simplifies database management.
            It has excellent documentation and a large community of developers who contribute to its development.

            Cons:

            Laravel can be challenging to learn for developers who are not familiar with PHP.
            It can be challenging to customize Laravel to meet specific project requirements.

            4. React

            Pros:

            React is a popular JavaScript-based framework that provides a set of tools and libraries for building dynamic user interfaces.
            It has excellent performance and can handle complex user interfaces with ease.
            It has a large community of developers who contribute to its development.

            Cons:

            React is a client-side framework, which means it does not provide tools for building the server-side of web applications.
            It can be challenging to learn for developers who are not familiar with JavaScript.

            Conclusion

            Ultimately, the right web framework for your project depends on your unique requirements and preferences. By understanding the pros and cons of different web frameworks, you can make an informed decision and choose a framework that meets your needs and helps you achieve your development goals.
            ",
            'user_id' => 2
        ],
        [
            'title' => 'How to Debug Your Code Like a Pro',
            'short' => 'This post could share some strategies for effective debugging, such as using console.log statements, stepping through code with a debugger, and using error tracking tools.',
            'content' => "
            Debugging code is a crucial skill for any developer, whether you're a beginner or an experienced professional. Debugging is the process of identifying and fixing errors, bugs, and issues in your code. In this post, we'll explore some tips and best practices for debugging your code like a pro.

            1. Understand the Problem

            Before you start debugging your code, it's essential to understand the problem you're trying to solve. Take the time to read the error messages carefully, and try to understand what they mean. Look for clues in the error messages, such as the line number where the error occurred, and any additional information that might help you narrow down the problem.

            2. Use a Debugger

            A debugger is a tool that allows you to step through your code and observe its behavior. Most programming languages come with a debugger built-in, and there are also third-party debuggers available. Using a debugger can help you identify the source of the problem quickly and efficiently.

            3. Check Your Inputs and Outputs

            One common source of errors in code is incorrect inputs and outputs. Make sure that your inputs and outputs are valid and that they match the expected format. If your code is interacting with a database or API, make sure that the data you're sending and receiving is correct.

            4. Test Small Pieces of Code

            When you're trying to debug a large codebase, it can be overwhelming to try and identify the source of the problem. Instead, try to break your code down into smaller pieces and test each piece individually. This can help you identify the source of the problem more quickly and efficiently.

            5. Use Print Statements

            Print statements are a simple but effective way to debug your code. By adding print statements to your code, you can see the value of variables and the flow of your program. This can help you identify the source of the problem and make the necessary fixes.

            6. Collaborate with Others

            Debugging can be a challenging and time-consuming process, so it can be helpful to collaborate with others. Ask your colleagues or peers for help, and consider using online forums or chat groups to get feedback and support.

            7. Stay Organized

            Finally, it's essential to stay organized when you're debugging your code. Keep track of the changes you make, and document the steps you took to identify and fix the problem. This can help you avoid making the same mistakes in the future and make the debugging process more efficient.

            Conclusion

            Debugging is an essential skill for any developer, and by following these tips and best practices, you can debug your code like a pro. Remember to take the time to understand the problem, use a debugger, test small pieces of code, and collaborate with others. By staying organized and keeping track of your progress, you can identify and fix errors quickly and efficiently.
            ",
            'user_id' => 2
        ],
        [
            'title' => 'Building Scalable and Maintainable Codebases',
            'short' => 'In this post, you could discuss some principles of writing scalable and maintainable code, such as using design patterns, modular code architecture, and testing.',
            'content' => "
            Building scalable and maintainable codebases is a critical skill for any developer or development team. A scalable codebase is one that can handle increasing amounts of traffic, data, and complexity without sacrificing performance or stability. A maintainable codebase is one that is easy to modify, update, and extend over time. In this post, we'll explore some tips and best practices for building scalable and maintainable codebases.

            1. Plan Ahead

            One of the keys to building a scalable and maintainable codebase is to plan ahead. Take the time to identify your project's requirements, and think about how your codebase will need to evolve over time. Consider factors like scalability, performance, security, and maintainability, and design your codebase with these factors in mind.

            2. Use Consistent Coding Standards

            Using consistent coding standards can help you build a codebase that is easy to read, understand, and modify. Establishing coding standards and best practices early on can help you avoid inconsistencies and make it easier for new developers to understand and contribute to the codebase.

            3. Modularize Your Code

            Modularizing your code into smaller, self-contained modules can help you build a codebase that is easy to modify, update, and extend over time. By breaking your code down into smaller pieces, you can isolate changes and minimize the risk of unintended side effects.

            4. Test Your Code

            Testing is an essential part of building a scalable and maintainable codebase. By writing automated tests, you can catch bugs and issues early on and ensure that your codebase remains stable and reliable over time. Write tests for your code as you develop it, and run them regularly to catch issues before they become bigger problems.

            5. Document Your Code

            Documentation is essential for building a maintainable codebase. By documenting your code, you can make it easier for other developers to understand and modify your codebase over time. Write clear, concise comments and documentation for your code, and keep it up to date as your codebase evolves.

            6. Use Version Control

            Using version control can help you keep track of changes to your codebase over time. Version control systems like Git allow you to track changes, revert to previous versions, and collaborate with other developers more easily. Use version control from the start of your project, and make sure that all team members are familiar with its use.

            Conclusion

            Building a scalable and maintainable codebase is a challenging but rewarding task. By following these tips and best practices, you can design a codebase that can handle increasing amounts of traffic, data, and complexity without sacrificing performance or stability. Remember to plan ahead, use consistent coding standards, modularize your code, test your code, document your code, and use version control. With these practices in place, you can build a codebase that is scalable, maintainable, and efficient over time.
            ",
            'user_id' => 2
        ]
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }

        $post = Post::find(1);
        $post->tags()->sync(4);

        $post = Post::find(2);
        $post->tags()->sync([3,4]);

        $post = Post::find(3);
        $post->tags()->sync([2,3,4]);

        $post = Post::find(4);
        $post->tags()->sync([3,4]);

        $post = Post::find(5);
        $post->tags()->sync([3,4]);
    }
}
