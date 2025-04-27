# Event Management System

A Laravel and Livewire-based application for managing events, invitations, requisition lists, and galleries.

## Setup Instructions
1. Clone the repository: `https://github.com/SyamKannan/event-management.git`
2. Install dependencies: `composer install && npm install`
3. Copy `.env.example` to `.env` and configure database settings.
4. Run migrations: `php artisan migrate`
5. Compile assets: `npm run dev`
6. Start the server: `php artisan serve`

## Approach
- Used Laravel Breeze for authentication.
- Implemented Livewire for real-time interactivity.
- Defined Eloquent models with relationships for events, invitations, requisition items, and gallery images.
- Applied authorization checks for access control.
- Validated inputs on both frontend and backend.

## Assumptions
- All users have the same access level.
- Image uploads are stored in `storage/app/public/gallery`.
- Event expiry is based on the event date.

## Bonus Features
- Not done
