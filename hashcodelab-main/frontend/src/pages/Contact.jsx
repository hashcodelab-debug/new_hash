import React, { useState } from 'react';
import axios from 'axios';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Textarea } from '@/components/ui/textarea';
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select';
import { Checkbox } from '@/components/ui/checkbox';
import { Label } from '@/components/ui/label';
import { toast } from 'sonner';
import { Mail, Phone, MapPin, Clock } from 'lucide-react';

const BACKEND_URL = process.env.REACT_APP_BACKEND_URL;
const API = `${BACKEND_URL}/api`;

const Contact = () => {
  const [formData, setFormData] = useState({
    full_name: '',
    email: '',
    phone: '',
    company_name: '',
    service_interested: '',
    budget: '',
    message: '',
    how_heard: '',
    agree_privacy: false
  });
  const [loading, setLoading] = useState(false);

  const handleChange = (e) => {
    const { name, value, type, checked } = e.target;
    setFormData(prev => ({
      ...prev,
      [name]: type === 'checkbox' ? checked : value
    }));
  };

  const handleSelectChange = (name, value) => {
    setFormData(prev => ({ ...prev, [name]: value }));
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    
    if (formData.message.length < 50) {
      toast.error('Message must be at least 50 characters long');
      return;
    }
    
    if (!formData.agree_privacy) {
      toast.error('Please agree to the privacy policy');
      return;
    }

    setLoading(true);
    try {
      const response = await axios.post(`${API}/contact`, formData);
      toast.success(`Thank you! Your query has been submitted. Reference ID: ${response.data.id}`);
      setFormData({
        full_name: '',
        email: '',
        phone: '',
        company_name: '',
        service_interested: '',
        budget: '',
        message: '',
        how_heard: '',
        agree_privacy: false
      });
    } catch (error) {
      toast.error('Failed to submit form. Please try again.');
      console.error('Error submitting form:', error);
    } finally {
      setLoading(false);
    }
  };

  return (
    <div className="min-h-screen" data-testid="contact-page">
      {/* Hero */}
      <section className="bg-gradient-to-r from-blue-600 to-blue-800 text-white pt-32 pb-20">
        <div className="container mx-auto px-4">
          <div className="max-w-3xl mx-auto text-center">
            <h1 className="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6" data-testid="contact-hero-title">Get In Touch</h1>
            <p className="text-base sm:text-lg text-blue-100">
              Have a project in mind? Let's discuss how we can help bring your ideas to life.
            </p>
          </div>
        </div>
      </section>

      {/* Contact Section */}
      <section className="py-20">
        <div className="container mx-auto px-4">
          <div className="grid lg:grid-cols-3 gap-12">
            {/* Contact Info */}
            <div className="lg:col-span-1">
              <h2 className="text-2xl font-bold mb-6 text-gray-900" data-testid="contact-info-title">Contact Information</h2>
              <div className="space-y-6">
                <div className="flex gap-4" data-testid="contact-address">
                  <div className="flex-shrink-0">
                    <div className="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                      <MapPin className="w-6 h-6 text-blue-600" />
                    </div>
                  </div>
                  <div>
                    <h3 className="font-semibold text-gray-900 mb-1">Address</h3>
                    <p className="text-gray-600">123 Tech Street, Silicon Valley, CA 94025, USA</p>
                  </div>
                </div>
                <div className="flex gap-4" data-testid="contact-email">
                  <div className="flex-shrink-0">
                    <div className="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                      <Mail className="w-6 h-6 text-blue-600" />
                    </div>
                  </div>
                  <div>
                    <h3 className="font-semibold text-gray-900 mb-1">Email</h3>
                    <p className="text-gray-600">info@hashcodelab.com</p>
                    <p className="text-gray-600">support@hashcodelab.com</p>
                  </div>
                </div>
                <div className="flex gap-4" data-testid="contact-phone">
                  <div className="flex-shrink-0">
                    <div className="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                      <Phone className="w-6 h-6 text-blue-600" />
                    </div>
                  </div>
                  <div>
                    <h3 className="font-semibold text-gray-900 mb-1">Phone</h3>
                    <p className="text-gray-600">+1 (555) 123-4567</p>
                    <p className="text-gray-600">+1 (555) 987-6543</p>
                  </div>
                </div>
                <div className="flex gap-4" data-testid="contact-hours">
                  <div className="flex-shrink-0">
                    <div className="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                      <Clock className="w-6 h-6 text-blue-600" />
                    </div>
                  </div>
                  <div>
                    <h3 className="font-semibold text-gray-900 mb-1">Office Hours</h3>
                    <p className="text-gray-600">Monday - Friday: 9:00 AM - 6:00 PM</p>
                    <p className="text-gray-600">Saturday: 10:00 AM - 4:00 PM</p>
                  </div>
                </div>
              </div>

              {/* Map */}
              <div className="mt-8 rounded-lg overflow-hidden" data-testid="contact-map">
                <iframe
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.6282810351377!2d-122.08624908469225!3d37.38605197983145!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb5e3c7a68f23%3A0x87f8e6ad7c2f8b5!2sSilicon%20Valley!5e0!3m2!1sen!2sus!4v1234567890"
                  width="100%"
                  height="250"
                  style={{ border: 0 }}
                  allowFullScreen=""
                  loading="lazy"
                  referrerPolicy="no-referrer-when-downgrade"
                ></iframe>
              </div>
            </div>

            {/* Contact Form */}
            <div className="lg:col-span-2">
              <div className="bg-white p-8 rounded-xl shadow-lg">
                <h2 className="text-2xl font-bold mb-6 text-gray-900" data-testid="contact-form-title">Send Us a Message</h2>
                <form onSubmit={handleSubmit} className="space-y-6" data-testid="contact-form">
                  <div className="grid md:grid-cols-2 gap-6">
                    <div>
                      <Label htmlFor="full_name">Full Name *</Label>
                      <Input
                        id="full_name"
                        name="full_name"
                        value={formData.full_name}
                        onChange={handleChange}
                        required
                        data-testid="form-full-name"
                      />
                    </div>
                    <div>
                      <Label htmlFor="email">Email Address *</Label>
                      <Input
                        id="email"
                        name="email"
                        type="email"
                        value={formData.email}
                        onChange={handleChange}
                        required
                        data-testid="form-email"
                      />
                    </div>
                  </div>

                  <div className="grid md:grid-cols-2 gap-6">
                    <div>
                      <Label htmlFor="phone">Phone Number</Label>
                      <Input
                        id="phone"
                        name="phone"
                        type="tel"
                        value={formData.phone}
                        onChange={handleChange}
                        data-testid="form-phone"
                      />
                    </div>
                    <div>
                      <Label htmlFor="company_name">Company Name</Label>
                      <Input
                        id="company_name"
                        name="company_name"
                        value={formData.company_name}
                        onChange={handleChange}
                        data-testid="form-company"
                      />
                    </div>
                  </div>

                  <div className="grid md:grid-cols-2 gap-6">
                    <div>
                      <Label htmlFor="service_interested">Service Interested In *</Label>
                      <Select onValueChange={(value) => handleSelectChange('service_interested', value)} required>
                        <SelectTrigger data-testid="form-service">
                          <SelectValue placeholder="Select a service" />
                        </SelectTrigger>
                        <SelectContent>
                          <SelectItem value="Web Design & Development">Web Design & Development</SelectItem>
                          <SelectItem value="App Development">App Development</SelectItem>
                          <SelectItem value="Web Applications">Web Applications</SelectItem>
                          <SelectItem value="Graphic Design">Graphic Design</SelectItem>
                          <SelectItem value="SEO & Digital Marketing">SEO & Digital Marketing</SelectItem>
                          <SelectItem value="AI Solutions">AI Solutions</SelectItem>
                        </SelectContent>
                      </Select>
                    </div>
                    <div>
                      <Label htmlFor="budget">Project Budget</Label>
                      <Select onValueChange={(value) => handleSelectChange('budget', value)}>
                        <SelectTrigger data-testid="form-budget">
                          <SelectValue placeholder="Select budget range" />
                        </SelectTrigger>
                        <SelectContent>
                          <SelectItem value="<$1000">Less than $1,000</SelectItem>
                          <SelectItem value="$1000-$5000">$1,000 - $5,000</SelectItem>
                          <SelectItem value="$5000-$10000">$5,000 - $10,000</SelectItem>
                          <SelectItem value="$10000+">$10,000+</SelectItem>
                          <SelectItem value="Not Sure">Not Sure</SelectItem>
                        </SelectContent>
                      </Select>
                    </div>
                  </div>

                  <div>
                    <Label htmlFor="how_heard">How Did You Hear About Us?</Label>
                    <Select onValueChange={(value) => handleSelectChange('how_heard', value)}>
                      <SelectTrigger data-testid="form-how-heard">
                        <SelectValue placeholder="Select an option" />
                      </SelectTrigger>
                      <SelectContent>
                        <SelectItem value="Google Search">Google Search</SelectItem>
                        <SelectItem value="Social Media">Social Media</SelectItem>
                        <SelectItem value="Referral">Referral</SelectItem>
                        <SelectItem value="Advertisement">Advertisement</SelectItem>
                        <SelectItem value="Other">Other</SelectItem>
                      </SelectContent>
                    </Select>
                  </div>

                  <div>
                    <Label htmlFor="message">Project Details * (minimum 50 characters)</Label>
                    <Textarea
                      id="message"
                      name="message"
                      value={formData.message}
                      onChange={handleChange}
                      rows={6}
                      required
                      minLength={50}
                      data-testid="form-message"
                    />
                    <p className="text-sm text-gray-500 mt-1">{formData.message.length} / 50 characters</p>
                  </div>

                  <div className="flex items-center space-x-2">
                    <Checkbox
                      id="agree_privacy"
                      name="agree_privacy"
                      checked={formData.agree_privacy}
                      onCheckedChange={(checked) => handleSelectChange('agree_privacy', checked)}
                      required
                      data-testid="form-privacy-checkbox"
                    />
                    <Label htmlFor="agree_privacy" className="text-sm">
                      I agree to the <a href="/privacy-policy" className="text-blue-600 hover:underline">Privacy Policy</a> *
                    </Label>
                  </div>

                  <Button
                    type="submit"
                    className="w-full bg-blue-600 hover:bg-blue-700"
                    disabled={loading}
                    data-testid="form-submit-button"
                  >
                    {loading ? 'Submitting...' : 'Submit Inquiry'}
                  </Button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  );
};

export default Contact;