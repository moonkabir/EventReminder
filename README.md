# 📅 Event Reminder System (Laravel)

A Laravel-based event reminder application that supports:

- ✅ Event creation & management
- ✅ CSV event import with row-level validation
- ✅ Email reminders (with queue & scheduling)

---

## 🧰 Requirements

- PHP 8.1+
- Composer
- MySQL or SQLite
- Node.js & npm
- Laravel 10+

---

## 🚀 Setup Instructions

### 1. Clone the Project

```bash
git clone https://github.com/moonkabir/EventReminder
cd event-reminder
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install Frontend Dependencies

```bash
npm install && npm run dev
```

### 4. Configure `.env`

```bash
cp .env.example .env
php artisan key:generate
```

Update the following values in `.env`:

```env
DB_DATABASE=your_db
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_FROM_ADDRESS=reminder@example.com
MAIL_FROM_NAME="Event Reminder"
```

> 🔐 For email testing, use [Mailtrap.io](https://mailtrap.io).

### 5. Run Migrations

```bash
php artisan migrate
```

---

## ⚙️ Running the App

```bash
php artisan serve
```

Visit: [http://localhost:8000](http://localhost:8000)

---

## 📧 Schedule Reminder Emails

### Enable Scheduler

Add the following to your system's cron:

```bash
* * * * * cd /path-to-project && php artisan schedule:run >> /dev/null 2>&1
```

This will run the Laravel scheduler every minute and send reminder emails before each event.

---

## 📥 CSV Import

- Go to **"Import Events"** from the navigation
- Upload CSV with columns:
  - `title`, `description`, `date_time`, `status`, `participants_email`
- Rows with errors will be shown with line-by-line messages

---

## 🧪 Tests (optional)

```bash
php artisan test
```

---

## 📦 Build for Production

```bash
npm run build
```

---

## 🙋‍♂️ Author

Moon Kabir – [moonkabir4@gmail.com](mailto:moonkabir4@gmail.com)

---

## 📄 License

MIT
