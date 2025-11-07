import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import { Facebook, Twitter, Linkedin, Instagram, Mail, Phone, MapPin, Send } from 'lucide-react';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { toast } from 'sonner';

const Footer = () => {
  const [email, setEmail] = useState('');

  const handleNewsletterSubmit = (e) => {
    e.preventDefault();
    if (email) {
      toast.success('Thank you for subscribing to our newsletter!');
      setEmail('');
    }
  };

  return (
    <footer className="bg-gray-900 text-gray-300" data-testid="main-footer">
      {/* Main Footer */}
      <div className="container mx-auto px-4 py-16">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
          {/* Company Info */}
          <div>
            <div className="flex items-center space-x-2 mb-4">
              <div className="w-10 h-10 bg-gradient-to-br from-blue-600 to-blue-800 rounded-lg flex items-center justify-center">
                <span className="text-white font-bold text-xl">H</span>
              </div>
              <span className="text-2xl font-bold text-white">HashCodeLab</span>
            </div>
            <p className="text-sm mb-4">
              Professional IT services company offering comprehensive technology solutions for businesses worldwide.
            </p>
            <div className="flex space-x-4">
              <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" className="hover:text-blue-500 transition-colors" data-testid="social-facebook">
                <Facebook className="w-5 h-5" />
              </a>
              <a href="https://twitter.com" target="_blank" rel="noopener noreferrer" className="hover:text-blue-400 transition-colors" data-testid="social-twitter">
                <Twitter className="w-5 h-5" />
              </a>
              <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" className="hover:text-blue-600 transition-colors" data-testid="social-linkedin">
                <Linkedin className="w-5 h-5" />
              </a>
              <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" className="hover:text-pink-500 transition-colors" data-testid="social-instagram">
                <Instagram className="w-5 h-5" />
              </a>
            </div>
          </div>

          {/* Quick Links */}
          <div>
            <h3 className="text-white font-semibold text-lg mb-4">Quick Links</h3>
            <ul className="space-y-2">
              <li><Link to="/" className="hover:text-blue-500 transition-colors text-sm" data-testid="footer-link-home">Home</Link></li>
              <li><Link to="/about" className="hover:text-blue-500 transition-colors text-sm" data-testid="footer-link-about">About Us</Link></li>
              <li><Link to="/portfolio" className="hover:text-blue-500 transition-colors text-sm" data-testid="footer-link-portfolio">Portfolio</Link></li>
              <li><Link to="/blog" className="hover:text-blue-500 transition-colors text-sm" data-testid="footer-link-blog">Blog</Link></li>
              <li><Link to="/careers" className="hover:text-blue-500 transition-colors text-sm" data-testid="footer-link-careers">Careers</Link></li>
              <li><Link to="/contact" className="hover:text-blue-500 transition-colors text-sm" data-testid="footer-link-contact">Contact</Link></li>
            </ul>
          </div>

          {/* Services */}
          <div>
            <h3 className="text-white font-semibold text-lg mb-4">Services</h3>
            <ul className="space-y-2">
              <li><Link to="/services/web-design" className="hover:text-blue-500 transition-colors text-sm" data-testid="footer-service-web">Web Design</Link></li>
              <li><Link to="/services/app-development" className="hover:text-blue-500 transition-colors text-sm" data-testid="footer-service-app">App Development</Link></li>
              <li><Link to="/services/graphic-design" className="hover:text-blue-500 transition-colors text-sm" data-testid="footer-service-graphic">Graphic Design</Link></li>
              <li><Link to="/services/seo-marketing" className="hover:text-blue-500 transition-colors text-sm" data-testid="footer-service-seo">SEO & Marketing</Link></li>
              <li><Link to="/services/ai-solutions" className="hover:text-blue-500 transition-colors text-sm" data-testid="footer-service-ai">AI Solutions</Link></li>
            </ul>
          </div>

          {/* Newsletter */}
          <div>
            <h3 className="text-white font-semibold text-lg mb-4">Newsletter</h3>
            <p className="text-sm mb-4">Subscribe to get latest updates and news.</p>
            <form onSubmit={handleNewsletterSubmit} className="space-y-2" data-testid="newsletter-form">
              <Input
                type="email"
                placeholder="Your email"
                value={email}
                onChange={(e) => setEmail(e.target.value)}
                className="bg-gray-800 border-gray-700 text-white"
                required
                data-testid="newsletter-email-input"
              />
              <Button type="submit" className="w-full bg-blue-600 hover:bg-blue-700" data-testid="newsletter-submit-button">
                Subscribe <Send className="w-4 h-4 ml-2" />
              </Button>
            </form>
            <div className="mt-6 space-y-2">
              <div className="flex items-center gap-2 text-sm">
                <Mail className="w-4 h-4 text-blue-500" />
                <span>info@hashcodelab.com</span>
              </div>
              <div className="flex items-center gap-2 text-sm">
                <Phone className="w-4 h-4 text-blue-500" />
                <span>+1 (555) 123-4567</span>
              </div>
              <div className="flex items-center gap-2 text-sm">
                <MapPin className="w-4 h-4 text-blue-500" />
                <span>123 Tech Street, Silicon Valley</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      {/* Bottom Footer */}
      <div className="border-t border-gray-800">
        <div className="container mx-auto px-4 py-6">
          <div className="flex flex-col md:flex-row justify-between items-center">
            <p className="text-sm text-gray-400">
              &copy; {new Date().getFullYear()} HashCodeLab. All rights reserved.
            </p>
            <div className="flex space-x-6 mt-4 md:mt-0">
              <Link to="/privacy-policy" className="text-sm text-gray-400 hover:text-blue-500 transition-colors" data-testid="footer-privacy">
                Privacy Policy
              </Link>
              <Link to="/terms" className="text-sm text-gray-400 hover:text-blue-500 transition-colors" data-testid="footer-terms">
                Terms & Conditions
              </Link>
            </div>
          </div>
        </div>
      </div>
    </footer>
  );
};

export default Footer;