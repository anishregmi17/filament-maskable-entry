# Security Policy

## Supported Versions

We release patches for security vulnerabilities in the following versions:

| Version | Supported          |
| ------- | ------------------ |
| 1.x     | :white_check_mark: |

## Reporting a Vulnerability

**Please do not report security vulnerabilities through public GitHub issues.**

If you discover a security vulnerability, please send an email to:

**[anishregminaglibang@gmail.com](mailto:anishregminaglibang@gmail.com)**

Please include the following information:

- Type of issue (e.g., XSS, SQL injection, authentication bypass)
- Full paths of source file(s) related to the issue
- Location of the affected source code (tag/branch/commit or direct URL)
- Step-by-step instructions to reproduce the issue
- Proof-of-concept or exploit code (if possible)
- Impact of the issue, including how an attacker might exploit it

We will acknowledge your email within 48 hours and send a more detailed response within 5 business days indicating the next steps in handling your report.

## Security Best Practices

When using this package:

1. **Always validate and sanitize user input** before passing it to MaskableEntry
2. **Use authorization checks** with the `toggleable()` method to control who can reveal sensitive data
3. **Never store sensitive data in plain text** - this component is for display only
4. **Be cautious with closures** - ensure they don't expose more data than intended
5. **Review your mask patterns** - ensure they don't reveal patterns that could aid in data breaches

## Disclosure Policy

- We will confirm the receipt of your vulnerability report
- We will provide an estimated timeline for a fix
- We will notify you when the vulnerability is fixed
- We will publicly disclose the vulnerability once a fix is released (with credit to the reporter, if desired)

Thank you for helping keep Filament Maskable Entry and its users safe!
