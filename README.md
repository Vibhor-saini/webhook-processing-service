# Webhook Processing Service

A Laravel-based backend service that receives, validates, and processes external webhook events from third-party systems such as payment gateways, booking platforms, and form providers.

This project simulates a real-world event-driven backend architecture used in modern integrations.

---

## Problem

Many external platforms (payment systems, CRMs, form tools) send event notifications to servers using webhooks.  
If these events are processed synchronously and the server takes too long to respond, the provider retries the request. This leads to:

- Duplicate orders
- Duplicate payments
- Multiple notifications
- Data inconsistency

Reliable webhook handling requires asynchronous processing, retry mechanisms, and failure tracking.

---

## Solution

This service implements a reliable webhook processing workflow:

1. Receive webhook request
2. Validate the endpoint
3. Store the event safely
4. Immediately acknowledge the request (fast response)
5. Process the event in the background using a queue worker
6. Track job status and recover from failures

---

## Architecture Flow

External Service  
→ Webhook Endpoint  
→ Middleware Verification  
→ Event Stored in Database  
→ Job Dispatched to Queue  
→ Background Worker Processes Event  
→ Status Updated (pending → processed / failed)

---

## Features

- Secure webhook endpoint validation
- Event logging and storage
- Idempotency (duplicate event prevention)
- Asynchronous processing using Laravel Queue
- Background worker execution
- Job status lifecycle tracking
- Failed job handling and retry mechanism
- RESTful JSON responses

---

## Tech Stack

- PHP
- Laravel
- MySQL
- REST APIs
- Queue Workers (Database driver)

---

## What This Demonstrates

- Handling third-party callbacks (webhooks)
- Event-driven backend design
- Asynchronous job processing
- Failure recovery & retry systems
- Backend reliability patterns used in production systems

---

## Local Setup

Clone the repository:---
git clone <your-repo-link>
cd webhook-processing-service


Install dependencies:---
composer install

Create environment file:---
cp .env.example .env
php artisan key:generate

php artisan migrate

Start server:--
php artisan serve

Start queue worker:---
php artisan queue:work

## Purpose
This project was built to understand how real-world systems reliably process external events using queues and background workers rather than simple CRUD operations.

##  Screenshots------------

### Dashboard
<img width="1363" height="520" alt="image" src="https://github.com/user-attachments/assets/88543cef-b122-4294-bbd7-b8f34621c07c" />

### Events
<img width="1353" height="491" alt="image" src="https://github.com/user-attachments/assets/b148923c-eebb-43fc-80a0-e9185006f24f" />

### Login
<img width="975" height="502" alt="image" src="https://github.com/user-attachments/assets/ee9c6a61-543d-401d-9e30-7bbd48ce5f91" />

###  API [postman]
<img width="956" height="560" alt="image" src="https://github.com/user-attachments/assets/02b0ded6-2c56-4758-8c64-9f53a836c221" />

### Token:-
<img width="959" height="506" alt="image" src="https://github.com/user-attachments/assets/a4b380a4-d4c0-41ce-aede-3c1fe292a577" />

### Events
<img width="952" height="617" alt="image" src="https://github.com/user-attachments/assets/85413475-10a9-4315-83ea-c5f5aaac2953" />

### queue processing:-
### <img width="1365" height="724" alt="image" src="https://github.com/user-attachments/assets/285e8d5e-1f99-46ed-a5c6-603af1d1ffc3" />

---

##  Key Concepts Covered

- Webhooks
- Queue & Jobs
- Idempotency
- Retry mechanisms
- Eloquent relationships
- N+1 problem
- API Resource
- Authentication (Session + Token)

---

##  Future Improvements

- Webhook signature verification
- Retry backoff strategy
- Redis queue
- Event logging system
- Alerts (email/slack)

##  Author
Vibhor Saini
