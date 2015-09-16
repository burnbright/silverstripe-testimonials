<% with Testimonial %>
	<% include Testimonial %>
<% end_with %>
<% if Page %>
	<a href="$Page.Link"><%t TestimonialWidget.READMORE 'read more...' %></a>
<% end_if %>