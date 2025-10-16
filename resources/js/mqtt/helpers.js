class Helpers {
    static ifTopic(expectedTopic, callback) {
        return (topic, payload) => {
            if (topic === expectedTopic) {
                callback(payload);
            }
        };
    }

    static percentInRange(percentage, min, max) {
        return Math.min(Math.max((percentage / max) * max, min), max);
    }

    static debounce(callback, wait) {
        let timeoutId = null;
        return (...args) => {
            window.clearTimeout(timeoutId);
            timeoutId = window.setTimeout(() => {
                callback(...args);
            }, wait);
        };
    }
}

window.Helpers = Helpers;
