Comment Wall
============================

This is based off of the Yii 2 Basic Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
rapidly creating small projects.

The template contains the basic features including user login/logout and a contact page.
It includes all commonly used configurations that would allow you to focus on adding new
features to your application.

[![Latest Stable Version](https://poser.pugx.org/yiisoft/yii2-app-basic/v/stable.png)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://poser.pugx.org/yiisoft/yii2-app-basic/downloads.png)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-basic.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-basic)

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



PROJECT-SPECIFIC FILES
------------

    views/site/index.php             Single page view
    view/site/show_comments.php      View for AJAX-loaded comment content
    models/Comments.php              ActiveRecord Model for Comments Table
    models/CommentForm.php           Extension of Comments Model for Form Handling
    controllers/SiteController.php   Controller for handling the single page load and ajax calls


REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.


PROJECT GOALS
------------

Description:

Create an application in which a user can post a comment to a wall and read other user comments posted to the wall. Feel free to keep the application as simple as possible, while demonstrating best practices in modern PHP development. You may utilize a PHP framework of your choice or develop your own architecture.

Deliverables:

Please submit this application as a Git repository.

Technical Specifications

● Overall Requirements

○ Completed in the LAMP stack

● Submission Requirements

○ The application must include fields for accepting a name, email, website, and comment.

○ The name and comments fields are required and the user must be alerted if any of them aren’t filled in upon submission.

○ Submitted comments should show up on the wall without a page refresh.

● Comment Listing Requirements

○ By default, list submitted comments in descending order above the comment submission form.

○ Comment listings should include name, comment, gravatar based on user submitted email, and time submitted.

○ If the user does not submit an email address, do not display an image next to the comment at all.

○ If the user user submits an email address, their displayed name should be a mailto link to their email address.

○ If the user submits a website, their displayed name should be a link to the website with a target “_blank” attribute.

○ Allow the user to sort the comments posted to the wall by date submitted descending or ascending.

● Non Requirements

○ Comments do not need to be approved before being posted to the wall.

○ The submission form and the comment wall do not need to be styled.