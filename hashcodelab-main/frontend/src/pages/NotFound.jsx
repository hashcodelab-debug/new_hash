import React from 'react';
import { Link } from 'react-router-dom';
import { Button } from '@/components/ui/button';
import { Home, ArrowLeft } from 'lucide-react';

const NotFound = () => {
  return (
    <div className="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-blue-100" data-testid="not-found-page">
      <div className="text-center px-4">
        <h1 className="text-9xl font-bold text-blue-600 mb-4" data-testid="error-code">404</h1>
        <h2 className="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Page Not Found</h2>
        <p className="text-lg text-gray-600 mb-8 max-w-md mx-auto">
          Oops! The page you're looking for doesn't exist. It might have been moved or deleted.
        </p>
        <div className="flex flex-col sm:flex-row gap-4 justify-center">
          <Link to="/">
            <Button size="lg" className="bg-blue-600 hover:bg-blue-700" data-testid="home-button">
              <Home className="mr-2 w-5 h-5" /> Go Home
            </Button>
          </Link>
          <Button
            size="lg"
            variant="outline"
            onClick={() => window.history.back()}
            data-testid="back-button"
          >
            <ArrowLeft className="mr-2 w-5 h-5" /> Go Back
          </Button>
        </div>
      </div>
    </div>
  );
};

export default NotFound;