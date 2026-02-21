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
