$(document).ready(function() {  
	$.reject({  
        // reject: {  
        //     safari: true, // Apple Safari  
        //     msie: true, // Microsoft Internet Explorer  
        //     opera: true, // Opera  
        //     konqueror: true, // Konqueror (Linux)  
        //     unknown: true // Everything else  
        // },
        beforeReject: function()
        {
            // if($.os.name === 'iphone' || $.os.name === 'ipad') // Block IOS users (for debugging purposes)
            // {
            //     this.reject = { all: true };
            // }
            // else
            // {
                if($.browser.name === 'firefox') // For Firefox, some versions below are not allowed
                {
                    this.reject = {
                        firefox19: true, firefox18: true, firefox17: true, firefox16: true, firefox15: true, firefox14: true,
                        firefox13: true, firefox12: true, firefox11: true, firefox10: true, firefox9: true,
                        firefox8: true, firefox7: true, firefox6: true, firefox5: true, firefox4: true,
                        firefox3: true, firefox2: true, firefox1: true
                    };
                }
                else if($.browser.name === 'chrome') // For Chrome, some versions below are not allowed
                {
                    this.reject = {
                        chrome21: true, chrome20: true, chrome19: true,
                        chrome18: true, chrome17: true, chrome16: true, chrome15: true, chrome14: true,
                        chrome13: true, chrome12: true, chrome11: true, chrome10: true, chrome9: true,
                        chrome8: true, chrome7: true, chrome6: true, chrome5: true, chrome4: true,
                        chrome3: true, chrome2: true, chrome1: true
                    };
                }
                else if ($.browser.name === 'msie') // For Internet Explorers, some versions below are not allowed
                {
                    this.reject = {
                        msie9: true, msie8: true, msie7: true, msie6: true, msie5: true, msie4: true,
                        msie3: true, msie2: true, msie1: true
                    };
                }
                else if ($.browser.name === 'safari') // For Safari, some versions below are not allowed
                {
                    if ($.os.name === 'iphone' || $.os.name === 'ipad' || $.os.name === 'mac')
                    {
                        this.reject = {safari4: true, safari3: true, safari2: true, safari1: true};
                    }
                    else
                    {
                        this.reject = {safari5: true, safari4: true, safari3: true, safari2: true, safari1: true};
                    }
                }
                else
                {
                    this.reject = {
                        // safari: true, // Apple Safari  
                        msie: true, // Microsoft Internet Explorer  
                        opera: true, // Opera  
                        konqueror: true, // Konqueror (Linux)  
                        unknown: true // Everything else  
                    };
                }
            // }
        },
        display: ['chrome','firefox', 'msie'],
        close: false, // Prevent closing of window 
        header: 'Your browser is currently not supported due to security issues.', // Header Text  
        paragraph1: 'Your browser might be out of date or may not be compatible with our website.', // Paragraph 1  
        paragraph2: 'Please update or install one of the optional browsers below to proceed.'
    }); // Customized Browsers 
});
