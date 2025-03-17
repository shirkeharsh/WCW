# WebContact - Web-Based Discord Chat Integration

WebContact is a simple yet powerful website that connects users directly to Discord chat via a web interface. It allows seamless communication without needing the Discord app installed.

## Features
- **Web-Based Discord Chat**: Connect and chat with Discord users directly from the browser.
- **Real-Time Messaging**: Instant message synchronization with Discord channels.
- **User Authentication**: Secure login via Discord OAuth.
- **Multiple Channels Support**: Users can switch between different Discord channels.
- **File Sharing**: Upload and share images, videos, and documents.
- **Admin Controls**: Moderators can manage users and messages.
- **Custom UI**: Sleek and responsive design for a better chat experience.

## Technologies Used
- **Frontend**: HTML, CSS, JavaScript (Bootstrap)
- **Backend**: Node.js, Express.js
- **Database**: MongoDB / SQLite (optional for chat logs)
- **Authentication**: Discord OAuth API
- **WebSockets**: Real-time messaging via Socket.io

## Installation Guide
### Prerequisites
- Node.js and npm installed
- A Discord bot with required permissions

### Steps to Install
1. Clone the repository:
   ```sh
   git clone https://github.com/yourusername/webcontact.git
   ```
2. Navigate to the project folder:
   ```sh
   cd webcontact
   ```
3. Install dependencies:
   ```sh
   npm install
   ```
4. Set up environment variables:
   - Create a `.env` file and configure:
     ```env
     DISCORD_BOT_TOKEN=your-bot-token
     DISCORD_CLIENT_ID=your-client-id
     DISCORD_CLIENT_SECRET=your-client-secret
     CALLBACK_URL=http://localhost:3000/auth/callback
     ```
5. Start the server:
   ```sh
   npm start
   ```
6. Open the web app in a browser:
   ```
   http://localhost:3000/
   ```

## Usage
1. **Login with Discord**: Authenticate using Discord OAuth.
2. **Join a Chat Channel**: Select and join a Discord server channel.
3. **Send Messages**: Chat with users in real-time.
4. **Share Files**: Upload and send images, videos, and documents.
5. **Moderation**: Admins can manage users and messages.

## Screenshots
![Chat Interface](screenshots/chat.png)
![User Login](screenshots/login.png)

## Future Enhancements
- Voice & Video Chat Integration.
- AI-powered message filtering for spam detection.
- Mobile app compatibility.
- Emoji and GIF support.

## Contributing
Pull requests are welcome! Feel free to submit issues and suggestions.

## License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Contact
For any queries or suggestions, contact: www.hrshshirke.site

