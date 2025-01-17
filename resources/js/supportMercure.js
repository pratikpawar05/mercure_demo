let mercureUrl = null

function getMercureUrl() {
    if (!mercureUrl && document.querySelector('[data-mercure-url]')) {
        mercureUrl = document
            .querySelector('[data-mercure-url]')
            .getAttribute('data-mercure-url')
    }
    return mercureUrl
}

document.addEventListener('livewire:init', (event) => {
    window.Livewire.hook('effects', (component, effects) => {
        const listeners = effects.listeners || []

        listeners.forEach((event) => {
            if (event.startsWith('mercure')) {
                const mercureUrl = getMercureUrl()
                if (!mercureUrl) {
                    console.warn(
                        "Warning: 'data-mercure-url' attribute not found. Ensure it is present in the HTML.",
                    )
                    return
                }

                if (typeof EventSource === 'undefined') {
                    console.warn(
                        'Warning: EventSource API (for Mercure) not available. Check browser compatibility.',
                    )
                    return
                }

                const eventParts = event.split('mercure:')
                const [s1, topic] = eventParts
                const url = `${mercureUrl}?topic=${topic}`

                const mercureEventSource = new EventSource(url, {
                    withCredentials: true,
                })

                mercureEventSource.onmessage = (e) => {
                    const data = JSON.parse(e.data)
                    component.$wire.dispatch(event, [data])
                    showToast(data['data']['payload']);
                }

                mercureEventSource.onerror = (e) => {
                    // console.log(e)
                }
            }
        })
    })
})



function showToast(message) {
    var toast = document.getElementById('toast');
    var toastMessage=document.getElementById('toast-message');
    toastMessage.textContent=message;
    toast.classList.remove('opacity-0');
    toast.classList.add('opacity-100');
    
    setTimeout(function() {
      toast.classList.remove('opacity-100');
      toast.classList.add('opacity-0');
    }, 3000); // 3000ms = 3 seconds
  
}
