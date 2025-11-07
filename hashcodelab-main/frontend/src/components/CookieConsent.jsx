import React, { useState, useEffect } from 'react';
import { Button } from '@/components/ui/button';
import { X } from 'lucide-react';

const CookieConsent = () => {
  const [showConsent, setShowConsent] = useState(false);

  useEffect(() => {
    const consent = localStorage.getItem('cookieConsent');
    if (!consent) {
      setShowConsent(true);
    }
  }, []);

  const acceptCookies = () => {
    localStorage.setItem('cookieConsent', 'accepted');
    setShowConsent(false);
  };

  const declineCookies = () => {
    localStorage.setItem('cookieConsent', 'declined');
    setShowConsent(false);
  };

  if (!showConsent) return null;

  return (
    <div className="fixed bottom-0 left-0 right-0 z-50 p-4 bg-white border-t-2 border-gray-200 shadow-lg animate-slide-in-right" data-testid="cookie-consent">
      <div className="container mx-auto">
        <div className="flex flex-col md:flex-row items-center justify-between gap-4">
          <div className="flex-1">
            <p className="text-sm text-gray-700">
              We use cookies to enhance your browsing experience and analyze our traffic. By clicking "Accept", you consent to our use of cookies.
            </p>
          </div>
          <div className="flex items-center gap-3">
            <Button
              onClick={declineCookies}
              variant="outline"
              size="sm"
              data-testid="cookie-decline-button"
            >
              Decline
            </Button>
            <Button
              onClick={acceptCookies}
              className="bg-blue-600 hover:bg-blue-700"
              size="sm"
              data-testid="cookie-accept-button"
            >
              Accept
            </Button>
            <button
              onClick={declineCookies}
              className="text-gray-500 hover:text-gray-700"
              data-testid="cookie-close-button"
            >
              <X className="w-5 h-5" />
            </button>
          </div>
        </div>
      </div>
    </div>
  );
};

export default CookieConsent;