document.addEventListener('DOMContentLoaded', () => {
    const terminalInput = document.getElementById('terminal-input');
    const terminalOutput = document.getElementById('terminal-output');
    const cursor = document.getElementById('cursor');
    let commandHistory = [];
    let currentCommandIndex = -1;
    
    // Display initial welcome message with typing effect
    const initialText = `Welcome to My Portfolio.
Type "contact" to get in touch.

> `;
    
    let currentText = "";
    let textIndex = 0;
    
    function typeEffect() {
        if (textIndex < initialText.length) {
            currentText += initialText[textIndex];
            terminalOutput.textContent = currentText;
            textIndex++;
            setTimeout(typeEffect, 100);
        }
    }
    
    typeEffect();

    // Focus the input field for typing
    terminalInput.focus();

    // Make sure the input is interactable while keeping it hidden
    terminalInput.addEventListener('focus', () => {
        terminalInput.style.opacity = 1;
        terminalInput.style.pointerEvents = 'auto';
    });

    // Handle user input when they press "Enter"
    terminalInput.addEventListener('keydown', (event) => {
        if (event.key === 'Enter') {
            const command = terminalInput.value.trim();
            if (command) {
                handleCommand(command);
                commandHistory.push(command);
                currentCommandIndex = commandHistory.length;
            }
            terminalInput.value = ''; // Clear input after submission
            terminalOutput.scrollTop = terminalOutput.scrollHeight; // Scroll to the bottom
        }
    });

    // Handle different commands
    function handleCommand(command) {
        terminalOutput.textContent += `> ${command}\n`; // Echo command to terminal

        // Process the "contact" command
        if (command.toLowerCase() === 'contact') {
            terminalOutput.textContent += `Redirecting to contact page...\n`;
            setTimeout(() => {
                window.location.href = 'contact.php'; // Redirect to contact page
            }, 1000); // Add delay before redirect
        } else {
            terminalOutput.textContent += `Unknown command: ${command}. Type "contact" to get in touch.\n> `;
        }

        // Auto-scroll to the bottom
        terminalOutput.scrollTop = terminalOutput.scrollHeight;
    }

    // Implement arrow keys for command history
    terminalInput.addEventListener('keydown', (event) => {
        if (event.key === 'ArrowUp') {
            if (currentCommandIndex > 0) {
                terminalInput.value = commandHistory[--currentCommandIndex];
            }
        } else if (event.key === 'ArrowDown') {
            if (currentCommandIndex < commandHistory.length - 1) {
                terminalInput.value = commandHistory[++currentCommandIndex];
            } else {
                terminalInput.value = '';
                currentCommandIndex = commandHistory.length;
            }
        }
    });
});
