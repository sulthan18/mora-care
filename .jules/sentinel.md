## 2024-05-23 - Added Security Headers Middleware
**Vulnerability:** Missing HTTP Security Headers
**Learning:** Default Laravel installations do not include security headers like X-Frame-Options, X-Content-Type-Options, or CSP by default. This leaves the application vulnerable to Clickjacking, MIME sniffing, and XSS attacks.
**Prevention:** Implement a global middleware to inject these headers into every response. This ensures "secure by default" behavior for all routes.
