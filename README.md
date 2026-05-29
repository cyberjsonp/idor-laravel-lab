# IDOR Bug Bounty Lab

A simple bug bounty lab built for practicing **IDOR (Insecure Direct Object Reference)** vulnerabilities.

## Purpose
This project is designed for educational and testing purposes, helping users understand how IDOR issues can appear in real applications.

## Test Users
You can log in with one of the sample users created by the seeders.

Example test accounts:
- `mamad@cyberjson.com` : `password` ;
- `alice@idorlab.test` : `password` ;
- `bob@idorlab.test` : `password` ;
- `victim@idorlab.test` : `password` ;
- `test@example.com` : `password` ;

> Use the seeded password configured in the project/database seeders.

## How to Test
- Log in with one test user
- Go to the challenge page
- Try interacting with objects/resources that should belong to other users
- Observe how IDOR behavior can be triggered in the lab

## Notes
- This lab is intentionally vulnerable for training purposes
- Do not use this code in production
- Recommended for local testing only

## Author
**cyberjson**

- Instagram: [m0x_mw4_d](https://instagram.com/m0x_mw4_d)
- X (Twitter): [@m0x_mw4_d](https://x.com/m0x_mw4_d)
