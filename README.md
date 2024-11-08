# Order Management Application

This application is a fully-featured Order Management system designed with Domain-Driven Design (DDD) principles,
implementing Value Objects, Domain Entities, and GRASP principles. It also includes Stripe payment integration for
handling real-time payment updates via webhooks.

## Architecture

The application follows **Clean Architecture** and **Domain-Driven Design (DDD)** principles. Key architectural
components:

- **Domain Entities**: Central to the application, representing the core business logic.
- **Value Objects**: Represent immutable values within the domain (e.g., Money, OrderStatus).
- **Domain Services**: Encapsulate business logic that doesn't fit within entities.
- **Repository Pattern**: Provides an abstraction over data persistence.

## Design Patterns

This project incorporates several design patterns to ensure scalability, maintainability, and testability:

- **Domain Entities and Value Objects**: Core concepts of DDD.
- **Repository Pattern**: Abstracts data persistence, allowing for easier testing and maintenance.
- **Dependency Injection (DI)**: Ensures loose coupling between services and repositories.

## Prerequisites

- **PHP** 8.x or higher
- **Composer** for dependency management
- **Stripe Account** and API Keys

## Setup

1. **Install dependencies**:
   ```bash
   composer install
   ```

2. **Environment Configuration**:
   Copy `.env.example` to `.env` and update necessary variables:
   ```bash
   cp .env.example .env
   ```

   Set your Stripe API keys:
   ```env
   STRIPE_KEY=your_stripe_key
   STRIPE_SECRET=your_stripe_secret
   ```

3. **Database Migration**:
   Run migrations to set up the database tables:
   ```bash
   php artisan migrate
   ```

## Configuration

### Stripe API Keys

Set up the following Stripe-related keys in your `.env` file:

- **STRIPE_KEY**: Your Stripe secret key for API requests.
- **STRIPE_SECRET**: The webhook secret for validating incoming Stripe webhook events.

### Database Configuration

Update your database configuration in the `.env` file to match your database credentials.
