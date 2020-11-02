window._FETCHING = false

document.addEventListener('DOMContentLoaded', () => {
    bindEventListeners()
})

function bindEventListeners () {
    const messageSubmit = document.getElementById('messageSubmit')
    const messageInput = document.getElementById('messageInput')

    messageSubmit.addEventListener('click', () => {
        messageInput ? sendMessage(messageInput.value) : ''
    })

    messageInput.addEventListener('keydown', (e) => {
        if (e.key === 'Enter') {
            sendMessage(e.target.value)
        }
    })
}

function sendMessage (msg) {
    showNewMessage(msg, false)
    if (!window._FETCHING) {
        window._FETCHING = true
        fetch(`/index.php?userMessage=${msg}`)
        .then(res => res.json())
        .then(data => {
            window._FETCHING = false
            data.message ? showNewMessage(data.message, true) : showNewMessage('Connection error', true)
        })
        .catch(err => {
            window._FETCHING = false
            console.log(err)
        })
    }
}

function showNewMessage (msg, responseMessage) {
    const chatMessages = document.getElementById('chatMessages')
    const newMessage = document.createElement('p')
    const text = document.createTextNode(msg)
    
    if (responseMessage) {
        newMessage.classList.add('align-right')
    } else {
        const messageInput = document.getElementById('messageInput')
        messageInput.value = ''
    }

    newMessage.appendChild(text)
    chatMessages.appendChild(newMessage)
    
    chatMessages.scrollTop = chatMessages.scrollHeight;
}