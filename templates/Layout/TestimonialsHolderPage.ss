<h1 class="pagetitle">$Title</h1>
$Content
<div id="Testimonials" class="page">
	<% control Testimonials %>
		<div id="Testimonial$ID" class="testimonial <% if Image %>image<% end_if %>">
			<% if Image %>
				<% control Image.SetWidth(112) %>
				<div class="cornered">	
					<img src="$URL"/>
				</div>
				<% end_control %>
			<% end_if %>
			<div class="text">
				<p>"$Content"
					<br/><span class="ref">$Name<% if Business %>, $Business<% end_if %>.</span>
				</p>
			</div>
			<div class="clear"><!--  --></div>
		</div>
	<% end_control %>
</div>