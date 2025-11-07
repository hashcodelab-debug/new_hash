import React, { useState, useEffect } from 'react';
import { Link, useLocation } from 'react-router-dom';
import { Menu, X, ChevronDown } from 'lucide-react';
import { Button } from '@/components/ui/button';

const Navbar = () => {
  const [isOpen, setIsOpen] = useState(false);
  const [isScrolled, setIsScrolled] = useState(false);
  const [servicesOpen, setServicesOpen] = useState(false);
  const location = useLocation();

  useEffect(() => {
    const handleScroll = () => {
      setIsScrolled(window.scrollY > 20);
    };
    window.addEventListener('scroll', handleScroll);
    return () => window.removeEventListener('scroll', handleScroll);
  }, []);

  useEffect(() => {
    setIsOpen(false);
    setServicesOpen(false);
  }, [location]);

  const services = [
    { name: 'Web Design & Development', slug: 'web-design' },
    { name: 'App Development', slug: 'app-development' },
    { name: 'Web Applications', slug: 'web-applications' },
    { name: 'Graphic Design', slug: 'graphic-design' },
    { name: 'SEO & Digital Marketing', slug: 'seo-marketing' },
    { name: 'AI Solutions', slug: 'ai-solutions' }
  ];

  return (
    <nav
      className={`fixed w-full z-50 transition-all duration-300 ${
        isScrolled ? 'bg-white shadow-md py-4' : 'bg-transparent py-6'
      }`}
      data-testid="main-navbar"
    >
      <div className="container mx-auto px-4">
        <div className="flex items-center justify-between">
          {/* Logo */}
          <Link to="/" className="flex items-center space-x-2" data-testid="logo-link">
            <div className="w-10 h-10 bg-gradient-to-br from-blue-600 to-blue-800 rounded-lg flex items-center justify-center">
              <span className="text-white font-bold text-xl">H</span>
            </div>
            <span className={`text-2xl font-bold ${
              isScrolled ? 'text-gray-900' : 'text-white'
            }`}>
              HashCodeLab
            </span>
          </Link>

          {/* Desktop Menu */}
          <div className="hidden lg:flex items-center space-x-8">
            <Link
              to="/"
              className={`font-medium hover:text-blue-600 transition-colors ${
                isScrolled ? 'text-gray-700' : 'text-white'
              }`}
              data-testid="nav-home"
            >
              Home
            </Link>
            <Link
              to="/about"
              className={`font-medium hover:text-blue-600 transition-colors ${
                isScrolled ? 'text-gray-700' : 'text-white'
              }`}
              data-testid="nav-about"
            >
              About
            </Link>
            
            {/* Services Dropdown */}
            <div className="relative group">
              <button
                className={`font-medium hover:text-blue-600 transition-colors flex items-center gap-1 ${
                  isScrolled ? 'text-gray-700' : 'text-white'
                }`}
                data-testid="nav-services-dropdown"
              >
                Services <ChevronDown className="w-4 h-4" />
              </button>
              <div className="absolute top-full left-0 pt-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200" data-testid="services-dropdown-menu">
                <div className="w-64 bg-white rounded-lg shadow-xl py-2">
                  {services.map((service) => (
                    <Link
                      key={service.slug}
                      to={`/services/${service.slug}`}
                      className="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors"
                      data-testid={`service-link-${service.slug}`}
                    >
                      {service.name}
                    </Link>
                  ))}
                </div>
              </div>
            </div>

            <Link
              to="/portfolio"
              className={`font-medium hover:text-blue-600 transition-colors ${
                isScrolled ? 'text-gray-700' : 'text-white'
              }`}
              data-testid="nav-portfolio"
            >
              Portfolio
            </Link>
            <Link
              to="/blog"
              className={`font-medium hover:text-blue-600 transition-colors ${
                isScrolled ? 'text-gray-700' : 'text-white'
              }`}
              data-testid="nav-blog"
            >
              Blog
            </Link>
            <Link
              to="/careers"
              className={`font-medium hover:text-blue-600 transition-colors ${
                isScrolled ? 'text-gray-700' : 'text-white'
              }`}
              data-testid="nav-careers"
            >
              Careers
            </Link>
            <Link to="/contact">
              <Button className="bg-blue-600 hover:bg-blue-700 text-white" data-testid="nav-contact-button">
                Contact Us
              </Button>
            </Link>
          </div>

          {/* Mobile Menu Button */}
          <button
            className={`lg:hidden ${
              isScrolled ? 'text-gray-900' : 'text-white'
            }`}
            onClick={() => setIsOpen(!isOpen)}
            data-testid="mobile-menu-toggle"
          >
            {isOpen ? <X className="w-6 h-6" /> : <Menu className="w-6 h-6" />}
          </button>
        </div>

        {/* Mobile Menu */}
        {isOpen && (
          <div className="lg:hidden mt-4 pb-4 animate-fade-in" data-testid="mobile-menu">
            <div className="flex flex-col space-y-4 bg-white rounded-lg p-4 shadow-lg">
              <Link to="/" className="text-gray-700 hover:text-blue-600 font-medium" data-testid="mobile-nav-home">
                Home
              </Link>
              <Link to="/about" className="text-gray-700 hover:text-blue-600 font-medium" data-testid="mobile-nav-about">
                About
              </Link>
              <div>
                <button
                  onClick={() => setServicesOpen(!servicesOpen)}
                  className="text-gray-700 hover:text-blue-600 font-medium flex items-center gap-1 w-full"
                  data-testid="mobile-services-toggle"
                >
                  Services <ChevronDown className={`w-4 h-4 transition-transform ${servicesOpen ? 'rotate-180' : ''}`} />
                </button>
                {servicesOpen && (
                  <div className="ml-4 mt-2 space-y-2" data-testid="mobile-services-menu">
                    {services.map((service) => (
                      <Link
                        key={service.slug}
                        to={`/services/${service.slug}`}
                        className="block text-gray-600 hover:text-blue-600"
                        data-testid={`mobile-service-link-${service.slug}`}
                      >
                        {service.name}
                      </Link>
                    ))}
                  </div>
                )}
              </div>
              <Link to="/portfolio" className="text-gray-700 hover:text-blue-600 font-medium" data-testid="mobile-nav-portfolio">
                Portfolio
              </Link>
              <Link to="/blog" className="text-gray-700 hover:text-blue-600 font-medium" data-testid="mobile-nav-blog">
                Blog
              </Link>
              <Link to="/careers" className="text-gray-700 hover:text-blue-600 font-medium" data-testid="mobile-nav-careers">
                Careers
              </Link>
              <Link to="/contact">
                <Button className="w-full bg-blue-600 hover:bg-blue-700 text-white" data-testid="mobile-contact-button">
                  Contact Us
                </Button>
              </Link>
            </div>
          </div>
        )}
      </div>
    </nav>
  );
};

export default Navbar;