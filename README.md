


<!-- PROJECT LOGO -->
<br />
<div align="center">
  

<h3 align="center">About Orders API</h3>

  <p align="center">
    built on core php using Propel2 ORM
   </p>
</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

Sample API to create , update & read Orders
<p align="right">(<a href="#readme-top">back to top</a>)</p>



### Built With

* Core Php + MySql
* Propel2 ORM
* Composer
<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Getting Started


### Prerequisites

This is an example of how to list things you need to use the software and how to install them.
* git clone
  ```sh
  git clone git@github.com:vkeysheoran/TestOrdersAPI.git
  ```
* setup php + mysql
* create a database Orders
* update the DB credentials in root/ propel.yaml
* delete generated/* folders
* run following command :
  * vendor/bin/propel model:build
  * vendor/bin/propel sql:build
  * vendor/bin/propel sql:insert
  * vendor/bin/propel config:convert
* insert in Customers table before usage of Orders API because of foreign key contraint :
  INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`) VALUES ('1', 'Test', 'Customer', 'test@customer.com');
  INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`) VALUES ('2', 'Test2', 'Customer', 'test@customer.com');
  INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`) VALUES ('3', 'Test3', 'Customer', 'test@customer.com');


* use postamn collection `Orders API.postman_collection.json` at the root directory to import postman collections of the API

## Added task scheduler python script
* 
  ```sh
  root/index.py
  ```
  is added for delayed orders scheduling with sample limit of 5 seconds for demonstartion , you can extend to the time / data as per requirenments
