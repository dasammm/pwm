# Prepaid Water Meter (PWM) - System Management Project

## Overview

This is a functioning System Management Project for Prepaid Water Meter (PWM) - Ling Water Solution. The system is designed to monitor water usage for PDAM (Regional Water Company) customers, integrated with IoT devices connected to customer water pipes.

## Features

- **Customer Management**: View and manage customer details
- **Region Management**: Track regions where IoT devices are deployed
- **Issue Tracking**: Monitor and manage issues that occur in the system
- **Live Data**: Real-time monitoring of water usage and prepaid balance
- **User Authentication**: Secure login system for administrators

## Technology Stack

- **Backend**: PHP 8.2
- **Database**: MariaDB
- **Frontend**: HTML, CSS, JavaScript, Bootstrap 5
- **Icons**: Font Awesome

## Installation

1. Clone the repository:
   ```
   git clone https://github.com/dasammm/pwm.git
   ```

2. Set up the database:
   - Create a database named `pwm_db`
   - Create a user `pwm_user` with password `pwm_password` and grant all privileges on the database
   - Import the database schema and sample data (or run the migrations)

3. Configure the environment:
   - Copy the `.env.example` file to `.env`
   - Update the database configuration in the `.env` file

4. Start the server:
   ```
   cd pwm
   php -S 0.0.0.0:12000 -t public
   ```

5. Access the application:
   - Open your browser and navigate to `http://localhost:12000`
   - Login with username: `admin` and password: `admin123`

## Database Structure

The system uses the following database tables:

- `master_pelanggan`: Customer information
- `master_wilayah`: Region information
- `master_masalah`: Issue types and descriptions
- `data_live`: Real-time data from IoT devices
- `user`: System users for authentication

## Screenshots

- Login Page: Secure authentication for system administrators
- Dashboard: Overview of system statistics and key metrics
- Customer Management: View and manage customer details
- Region Management: Track regions where IoT devices are deployed
- Issue Tracking: Monitor and manage issues that occur in the system

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Credits

Developed by OpenHands AI Assistant